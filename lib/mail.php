<?php

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/cart.php';
require_once __DIR__ . '/orders.php';

function getMailSetting($key, $default = '')
{
    $envKey = strtoupper($key);
    $env = getenv($envKey);

    if ($env !== false && $env !== '') {
        return $env;
    }

    $config = getDbConfig();

    return $config[$key] ?? $default;
}

function getSmtpConfig()
{
    return [
        'host' => getMailSetting('smtp_host'),
        'port' => (int) getMailSetting('smtp_port', '587'),
        'user' => getMailSetting('smtp_user'),
        'pass' => getMailSetting('smtp_pass'),
        'from_email' => getMailSetting('smtp_from_email', 'noreply@prelovedbaby.co.za'),
        'from_name' => getMailSetting('smtp_from_name', 'PreLoved Baby'),
        'encryption' => strtolower(getMailSetting('smtp_encryption', 'tls')),
    ];
}

function isSmtpConfigured()
{
    $config = getSmtpConfig();

    return $config['host'] !== '' && $config['from_email'] !== '';
}

function buildOrderReceiptBody(array $order, $customerName)
{
    $orderNumber = formatOrderNumber($order['order_id']);
    $lines = [
        'Hi ' . ($customerName !== '' ? $customerName : 'there') . ',',
        '',
        'Thank you for your order at PreLoved Baby.',
        '',
        'Order: ' . $orderNumber,
        'Payment reference: ' . ($order['payment_reference'] ?? 'N/A'),
        '',
        'Items:',
    ];

    foreach ($order['items'] as $item) {
        $lines[] = '- ' . $item['brand'] . ' ' . $item['name'] . ' — ' . formatPrice($item['price']);
    }

    $lines[] = '';
    $lines[] = 'Subtotal: ' . formatPrice($order['subtotal']);

    if ($order['courier_fee'] > 0) {
        $lines[] = 'Courier: ' . formatPrice($order['courier_fee']);
    }

    $lines[] = 'Total: ' . formatPrice($order['total']);
    $lines[] = '';
    $lines[] = 'We will notify you when your order is on its way.';
    $lines[] = '';
    $lines[] = 'PreLoved Baby';

    return implode("\n", $lines);
}

function sendOrderReceiptEmail($toEmail, $customerName, array $order)
{
    if (!filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
        return ['sent' => false, 'error' => 'Invalid customer email address.'];
    }

    if (!isSmtpConfigured()) {
        return ['sent' => false, 'error' => 'SMTP is not configured.'];
    }

    $subject = 'Your PreLoved Baby receipt — ' . formatOrderNumber($order['order_id']);
    $body = buildOrderReceiptBody($order, $customerName);

    try {
        sendSmtpEmail($toEmail, $subject, $body);

        return ['sent' => true, 'error' => null];
    } catch (Throwable $e) {
        error_log('Receipt email failed: ' . $e->getMessage());

        return ['sent' => false, 'error' => $e->getMessage()];
    }
}

function sendSmtpEmail($toEmail, $subject, $body)
{
    $config = getSmtpConfig();
    $host = $config['host'];
    $port = $config['port'];
    $encryption = $config['encryption'];
    $remote = ($encryption === 'ssl' ? 'ssl://' : '') . $host . ':' . $port;

    $socket = @stream_socket_client($remote, $errno, $errstr, 30);
    if (!$socket) {
        throw new RuntimeException('Could not connect to SMTP server: ' . $errstr);
    }

    stream_set_timeout($socket, 30);
    smtpExpect($socket, [220]);
    smtpCommand($socket, 'EHLO prelovedbaby.local', [250]);

    if ($encryption === 'tls') {
        smtpCommand($socket, 'STARTTLS', [220]);
        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new RuntimeException('Could not enable TLS for SMTP.');
        }
        smtpCommand($socket, 'EHLO prelovedbaby.local', [250]);
    }

    if ($config['user'] !== '') {
        smtpCommand($socket, 'AUTH LOGIN', [334]);
        smtpCommand($socket, base64_encode($config['user']), [334]);
        smtpCommand($socket, base64_encode($config['pass']), [235]);
    }

    smtpCommand($socket, 'MAIL FROM:<' . $config['from_email'] . '>', [250]);
    smtpCommand($socket, 'RCPT TO:<' . $toEmail . '>', [250, 251]);
    smtpCommand($socket, 'DATA', [354]);

    $headers = [
        'From: ' . formatEmailAddress($config['from_name'], $config['from_email']),
        'To: ' . $toEmail,
        'Subject: ' . $subject,
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
    ];

    $message = implode("\r\n", $headers) . "\r\n\r\n" . $body;
    $message = preg_replace("/\r\n\./", "\r\n..", $message);
    fwrite($socket, $message . "\r\n.\r\n");
    smtpExpect($socket, [250]);
    smtpCommand($socket, 'QUIT', [221]);
    fclose($socket);
}

function formatEmailAddress($name, $email)
{
    $safeName = str_replace(['"', '\\'], '', $name);

    return $safeName !== '' ? '"' . $safeName . '" <' . $email . '>' : $email;
}

function smtpCommand($socket, $command, array $expectedCodes)
{
    fwrite($socket, $command . "\r\n");
    smtpExpect($socket, $expectedCodes);
}

function smtpExpect($socket, array $expectedCodes)
{
    $response = '';

    while (($line = fgets($socket, 515)) !== false) {
        $response .= $line;
        if (isset($line[3]) && $line[3] === ' ') {
            break;
        }
    }

    $code = (int) substr($response, 0, 3);
    if (!in_array($code, $expectedCodes, true)) {
        throw new RuntimeException('Unexpected SMTP response: ' . trim($response));
    }
}
