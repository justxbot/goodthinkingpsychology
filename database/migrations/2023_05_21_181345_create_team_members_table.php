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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->string('fname');
            $table->string('lname');
            $table->string('degree');
            $table->string('role');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->on('plans')->references('id')->onDelete('cascade');
            $table->string('description');
            $table->string('availability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
