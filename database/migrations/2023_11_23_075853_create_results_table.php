<?php

use Illuminate\Broadcasting\Broadcasters\AblyBroadcaster;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->integer("marks");
            $table->char("grade");
            // $table->foreign("subject_id")->references("id")->on("subjects");
            // $table->foreign("sudent_id")->references("id")->on("students");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
