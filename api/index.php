<?php
// File ini dibuat khusus untuk Vercel agar bisa menjalankan Laravel (Serverless PHP)

// Paksa Laravel untuk meletakkan semua file cache di folder /tmp yang diizinkan oleh Vercel
$paths = [
    'APP_SERVICES_CACHE' => '/tmp/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/config.php',
    'APP_ROUTES_CACHE' => '/tmp/routes.php',
    'APP_EVENTS_CACHE' => '/tmp/events.php',
    'VIEW_COMPILED_PATH' => '/tmp',
    'LARAVEL_STORAGE_PATH' => '/tmp',
];

foreach ($paths as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

// Akan mengarahkan request ke public/index.php
require __DIR__ . '/../public/index.php';
