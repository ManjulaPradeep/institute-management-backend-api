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
            $table->id("course_id");
            // $table->bigInteger("course_id")->unique();
            $table->string("name")->unique();
            $table->string("credits");
            $table->date("start");
            $table->date("end");
            $table->integer("no_of_students");
            // $table->foreign("sudent_id")->references("id")->on("students");
            // $table->foreign("lecturer_id")->references("id")->on("lecturers");
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
