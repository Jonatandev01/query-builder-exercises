<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

if (file_exists(__DIR__.'/../vendor/autoload.php')) {
    // OK
} else {
    echo "Please run 'composer install' first.\n";
    exit(1);
}

require_once __DIR__.'/../vendor/autoload.php';

// Load env
if (file_exists(__DIR__.'/../.env')) {
    $dotenv = Dotenv::createImmutable(__DIR__.'/..');
    $dotenv->load();
}

$dbPath = $_ENV['DB_DATABASE'] ?? (__DIR__.'/../database/database.sqlite');

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => $dbPath,
    'prefix' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
