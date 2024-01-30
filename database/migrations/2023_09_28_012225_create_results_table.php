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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scores_id')->constrained('scores')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('examinations_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('questions_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('choices_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('answer')->nullable();
            $table->integer('attempt')->nullable();
            $table->integer('score')->default(0);
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
