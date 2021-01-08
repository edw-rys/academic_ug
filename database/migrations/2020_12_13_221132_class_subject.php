<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subject', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('course_subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('status')->default('active');
            $table->timestamps();
            // course_subject
            $table->foreign('course_subject_id')
                ->references('id')
                ->on('course_subject')
                ->onDelete('cascade');
            // Teacher id
            $table->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_subject');
        //
    }
}
