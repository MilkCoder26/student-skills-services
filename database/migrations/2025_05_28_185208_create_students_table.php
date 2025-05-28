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
        Schema::create('students', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('classe');
            $table->unsignedInteger('niveau');
            $table->string('competence');
            $table->string('sexe');
            $table->json('skills');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};