<?php
// Create or promote a user to admin with given email and password
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require_once $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$email = 'info@janiracare.ch';
$password = 'prizren123';

$user = User::where('email', $email)->first();

if ($user) {
    $user->is_admin = 1;
    $user->password = app('hash')->make($password);
    $user->save();
    echo "Updated user {$user->id} ({$user->email}) to admin.\n";
    exit(0);
}

$user = new User();
$user->name = 'Fation Krasniqi';
$user->email = $email;
$user->password = app('hash')->make($password);
$user->is_admin = 1;
$user->save();

echo "Created user {$user->id} ({$user->email}) as admin.\n";
