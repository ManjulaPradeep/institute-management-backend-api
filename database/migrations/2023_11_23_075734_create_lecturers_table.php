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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id("lecturer_id");
            // $table->bigInteger("lecturer_id")->unique();
            $table->string("name");
            $table->string("nic")->unique();
            $table->string("address");
            $table->string("contact");
            $table->string("email")->unique();
            // $table->foreign("course_id")->references("id")->on("courses");
            // $table->foreign("subject_id")->references("id")->on("subjects");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
