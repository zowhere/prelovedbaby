<?php
return [
    'db_host' => '127.0.0.1',
    'db_name' => 'prelovedbaby',
    'db_user' => 'root',
    'db_pass' => '',
    'db_charset' => 'utf8mb4',

    // fake = simulated Stripe (always succeeds in dev/demo)
    'payment_mode' => 'fake',

    // SMTP receipt emails
    'smtp_host' => '',
    'smtp_port' => 587,
    'smtp_user' => '',
    'smtp_pass' => '',
    'smtp_from_email' => 'noreply@prelovedbaby.co.za',
    'smtp_from_name' => 'PreLoved Baby',
    'smtp_encryption' => 'tls',

    // Firebase / Google Analytics measurement ID (e.g. G-XXXXXXXXXX). Production ID goes here only.
    'firebase_measurement_id' => 'G-L17QK6TR7C',
];
