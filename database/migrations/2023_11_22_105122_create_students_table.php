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
    
        // Schema::create('students', function (Blueprint $table) {
        //     $table->id("sudent_id");
        //     // $table->bigInteger("sudent_id")->unique();
        //     $table->string("name");
        //     $table->string("reg_no")->unique();
        //     $table->string("nic")->unique();
        //     $table->string("address");
        //     $table->string("contact");
        //     $table->string("email")->unique();
        //     $table->foreign("course_id")->references("id")->on("courses");
        //     $table->timestamps();
        // });

        Schema::create('students', function (Blueprint $table) {
            $table->id("student_id");
            // $table->bigInteger("student_id")->unique();
            $table->string("name");
            $table->string("reg_no")->unique();
            $table->string("nic")->unique();
            $table->string("address");
            $table->string("contact");
            $table->string("email")->unique();
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
