<?php
require 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

require 'src/bootstrap.php';

echo "Creating database folder...\n";
if (!is_dir('database')) mkdir('database', 0755, true);
if (!file_exists('database/database.sqlite')) {
    touch('database/database.sqlite');
    echo "Created database/database.sqlite\n";
} else {
    echo "database/database.sqlite already exists\n";
}

// Run migrations
echo "Running migrations...\n";
Capsule::schema()->dropIfExists('orders');
Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamps();
});

Capsule::schema()->create('orders', function ($table) {
    $table->increments('id');
    $table->integer('user_id')->unsigned();
    $table->string('product');
    $table->integer('quantity');
    $table->decimal('total', 10, 2);
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users');
});

echo "Migrations finished.\n";
// Seed sample data
echo "Seeding data...\n";
Capsule::table('users')->insert([
    ['name'=>'Ricardo', 'email'=>'ricardo@example.com', 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['name'=>'María', 'email'=>'maria@example.com', 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['name'=>'Rosa', 'email'=>'rosa@example.com', 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['name'=>'Carlos', 'email'=>'carlos@example.com', 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['name'=>'Ana', 'email'=>'ana@example.com', 'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
]);

Capsule::table('orders')->insert([
    ['user_id'=>1,'product'=>'Teclado','quantity'=>1,'total'=>120.50,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>2,'product'=>'Mouse','quantity'=>2,'total'=>45.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>2,'product'=>'Monitor','quantity'=>1,'total'=>180.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>3,'product'=>'USB','quantity'=>3,'total'=>75.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>5,'product'=>'Laptop','quantity'=>1,'total'=>950.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>4,'product'=>'Auriculares','quantity'=>1,'total'=>60.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
    ['user_id'=>5,'product'=>'Mouse Pad','quantity'=>2,'total'=>20.00,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
]);

echo "Seeding finished. You can run php run.php to execute the queries.\n";
