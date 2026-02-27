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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role'); // Principal / Teacher

            // Replace 'class' string with 'classroom_id' as foreign key
            $table->unsignedBigInteger('classroom_id');

            $table->string('subject');
            $table->decimal('salary', 10, 2);
            $table->string('phone_no');
            $table->text('address');
            $table->timestamps();

            // Optional: add foreign key constraint
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};