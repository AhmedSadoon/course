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
        Schema::create('training_courses_enrolments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studentID')->references('id')->on('student')->onUpdate('cascade');
            $table->foreignId('training_coursesID')->references('id')->on('training_courses')->onUpdate('cascade');
            $table->date('enrolments_date')->comment('تاريخ التسجيل في الدورة التدريبية');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_courses_enrolments');
    }
};
