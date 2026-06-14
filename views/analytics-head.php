<?php
$configPath = APP_ROOT . '/config/config.php';
if (!is_file($configPath)) {
    return;
}

$config = require $configPath;
$measurementId = trim($config['firebase_measurement_id'] ?? '');
if ($measurementId === '') {
    return;
}

$measurementId = htmlspecialchars($measurementId, ENT_QUOTES, 'UTF-8');
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $measurementId ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?= $measurementId ?>');
</script>
