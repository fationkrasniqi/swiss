<?php
// Simple script to grant can_view_clients and/or can_view_messages to a user by email
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(Illuminate\Http\Request::capture());

use App\Models\User;

$cli = new class {
    public static function run($argv) {
        if (! isset($argv[1]) || ! isset($argv[2])) {
            echo "Usage: php grant_staff_permissions.php user@example.com clients|messages|both\n";
            return;
        }
        $email = $argv[1];
        $which = $argv[2];
        $user = User::where('email', $email)->first();
        if (! $user) {
            echo "User not found: $email\n";
            return;
        }
        if ($which === 'clients' || $which === 'both') $user->can_view_clients = 1;
        if ($which === 'messages' || $which === 'both') $user->can_view_messages = 1;
        $user->save();
        echo "Updated user {$user->id} ({$user->email}). can_view_clients={$user->can_view_clients}, can_view_messages={$user->can_view_messages}\n";
    }
};

$cli::run($argv);
