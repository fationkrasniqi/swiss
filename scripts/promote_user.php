<?php
// Promote a user to admin by id or email
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require_once $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

if ($argc < 2) {
    echo "Usage: php promote_user.php <id|email>\n";
    exit(1);
}

$target = $argv[1];
if (ctype_digit($target)) {
    $user = User::find((int)$target);
} else {
    $user = User::where('email', $target)->first();
}

if (! $user) {
    echo "User not found: {$target}\n";
    exit(1);
}

$user->is_admin = 1;
$user->save();

echo "Promoted user {$user->id} ({$user->email}) to admin.\n";
