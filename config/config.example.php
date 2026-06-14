<?php
return [
    'db_host' => '127.0.0.1',
    'db_name' => 'prelovedbaby',
    'db_user' => 'root',
    'db_pass' => '',
    'db_charset' => 'utf8mb4',

    // fake = simulated Stripe (always succeeds in dev/demo); live = real Stripe (not wired yet)
    'payment_mode' => 'fake',

    // SMTP receipt emails (override with env vars SMTP_HOST, SMTP_PORT, etc.)
    'smtp_host' => '',
    'smtp_port' => 587,
    'smtp_user' => '',
    'smtp_pass' => '',
    'smtp_from_email' => 'noreply@prelovedbaby.co.za',
    'smtp_from_name' => 'PreLoved Baby',
    'smtp_encryption' => 'tls',
];
