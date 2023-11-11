<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('lecture_classes', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('start_time');
            $table->string('stop_time');
            $table->string('date');

            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('attendance_id');
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('school_id');

            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('attendance_id')->references('id')->on('lecture_attendances')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('added_by')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('school_id')->references('id')->on('schools')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_classes');
    }
};
