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
        Schema::create('services', function (Blueprint $table) {
             $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('set null')->nullable();
            $table->string('price_range');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};