<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffPermissionsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'can_view_clients')) {
                $table->boolean('can_view_clients')->default(false)->after('is_admin');
            }
            if (! Schema::hasColumn('users', 'can_view_messages')) {
                $table->boolean('can_view_messages')->default(false)->after('can_view_clients');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'can_view_messages')) {
                $table->dropColumn('can_view_messages');
            }
            if (Schema::hasColumn('users', 'can_view_clients')) {
                $table->dropColumn('can_view_clients');
            }
        });
    }
}
