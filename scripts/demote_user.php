<?php
// Demote a user from admin by id or email
$projectRoot = dirname(__DIR__);
require $projectRoot . '/vendor/autoload.php';
$app = require_once $projectRoot . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

if ($argc < 2) {
    echo "Usage: php demote_user.php <id|email>\n";
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

// Prevent demoting protected super-admin
$protected = getenv('SUPER_ADMIN_EMAIL') ?: 'info@janiracare.ch';
if ($user->email === $protected) {
    echo "Cannot demote protected user: {$user->email}\n";
    exit(1);
}

// Prevent accidentally demoting yourself if needed - no check here, run as CLI intentionally
$user->is_admin = 0;
$user->save();

echo "Demoted user {$user->id} ({$user->email}) from admin.\n";
