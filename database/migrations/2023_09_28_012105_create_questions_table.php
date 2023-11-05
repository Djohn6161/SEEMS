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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('question_types')->onDelete('cascade');
            $table->foreignId('examinations_id')->constrained('examinations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Question');
            $table->char('answer')->nullable();
            // $table->enum('type', ['essay', 'multiple_choices', 'true or false', 'identification', ''])
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
