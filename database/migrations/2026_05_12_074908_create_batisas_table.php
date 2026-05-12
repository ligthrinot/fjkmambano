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
        Schema::create('batisas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kristianina_id')->constrained('kristianinas')->onDelete('cascade');
            $table->date('daty');
            $table->string('mpanao_batisa')->nullable();
            $table->text('fanamarinana')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batisas');
    }
};
