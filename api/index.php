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
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'true',
    'APP_KEY' => 'base64:KzW4mLYruA7fPUeMIb9JXkR0GlfWctHqHyyDej9r7RY=',
    'APP_URL' => 'https://stock-opname-eta.vercel.app',
    'ASSET_URL' => 'https://stock-opname-eta.vercel.app',
    'LOG_CHANNEL' => 'stderr',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => __DIR__ . '/../database/database.sqlite',
    'SESSION_DRIVER' => 'cookie',
    'CACHE_STORE' => 'array',
];

foreach ($paths as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

// Akan mengarahkan request ke public/index.php
require __DIR__ . '/../public/index.php';
