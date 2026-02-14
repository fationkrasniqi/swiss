<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('canton');
            $table->string('services'); // comma-separated
            $table->integer('hours');
            $table->integer('total_price');
            $table->timestamps();
            
            // Indexes for performance
            $table->index('email');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};