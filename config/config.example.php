<?php

return [
    'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
    'db_name' => getenv('DB_NAME') ?: 'prelovedbaby',
    'db_user' => getenv('DB_USER') ?: 'root',
    'db_pass' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
    'db_charset' => 'utf8mb4',

    'payment_mode' => getenv('PAYMENT_MODE') ?: 'fake',

    'smtp_host' => getenv('SMTP_HOST') ?: '',
    'smtp_port' => (int) (getenv('SMTP_PORT') ?: 587),
    'smtp_user' => getenv('SMTP_USER') ?: '',
    'smtp_pass' => getenv('SMTP_PASS') ?: '',
    'smtp_from_email' => getenv('SMTP_FROM_EMAIL') ?: 'noreply@prelovedbaby.co.za',
    'smtp_from_name' => getenv('SMTP_FROM_NAME') ?: 'PreLoved Baby',
    'smtp_encryption' => getenv('SMTP_ENCRYPTION') ?: 'tls',

    'firebase_measurement_id' => getenv('FIREBASE_MEASUREMENT_ID') ?: '',
];
