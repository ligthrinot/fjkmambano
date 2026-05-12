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
    Schema::create('diakonas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kristianina_id')->constrained('kristianinas')->onDelete('cascade');
        $table->foreignId('groupe_diakona_id')->constrained('groupe_diakonas')->onDelete('cascade');
        $table->enum('karazana', ['Diakona', 'Loholona']);
        $table->date('daty_nofidiana')->nullable();
        $table->text('fanamariana')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diakonas');
    }
};
