<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();
$products = DB::table('products')->pluck('image', 'name');
foreach ($products as $name => $image) {
    echo $name . ' -> ' . $image . PHP_EOL;
}
