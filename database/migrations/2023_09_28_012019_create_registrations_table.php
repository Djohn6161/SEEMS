<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('first_name', 50)->nullable(false);
            $table->string('middle_name', 50)->nullable(true);
            $table->string('last_name', 50)->nullable(false);
            $table->string('extension', 5)->nullable(true);
            $table->date('date_of_birth')->nullable(false);
            $table->string('mobile_number', 11)->nullable(false);
            $table->string('password', 8)->nullable(false);
            $table->string('municipality')->nullable(false);
            $table->string('province')->nullable(false);
            $table->string('barangay')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
