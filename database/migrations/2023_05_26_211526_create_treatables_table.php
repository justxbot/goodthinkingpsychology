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
        Schema::create('treatables', function (Blueprint $table) {
            $table->id();
            $table->string("picture");
            $table->string("name");
            $table->text("description");
            $table->json("causes");
            $table->json("symptoms");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatables');
    }
};
