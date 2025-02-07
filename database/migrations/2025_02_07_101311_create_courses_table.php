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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            //$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); (Is the same with constrained)
            $table->foreignId('category_id')->constrained();
            //$table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade'); (Is the same with constrained)
            $table->foreignId('teacher_id')->constrained();
            $table->integer('duration');
            $table->enum('status', ['active', 'finished', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
