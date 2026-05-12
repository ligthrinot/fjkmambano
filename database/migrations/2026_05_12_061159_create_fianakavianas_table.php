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
        Schema::create('fianakaviana', function (Blueprint $table) {
            $table->id();
            $table->string('anarana');
            $table->string('adressy');
            $table->string('faritra');
            $table->string('fokontany');
            $table->string('fifandraisana')->nullable();
            $table->text('fanamarihana')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fianakavianas');
    }
};
