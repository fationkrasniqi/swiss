<?php
// Lightweight script to list users (id, name, email, is_admin)
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require_once $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$users = User::select('id','name','email','is_admin','created_at')->limit(20)->get()->toArray();
print_r($users);

echo "\nTotal: " . count($users) . "\n";
