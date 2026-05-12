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
    Schema::create('kristianinas', function (Blueprint $table) {
        $table->id();
        $table->string('anarana');
        $table->string('fanampiny');
        $table->date('daty_nahaterahana')->nullable();
        $table->date('daty_nidirana')->nullable();
        $table->string('fiangonana_niaviana')->nullable();
        $table->boolean('batisa')->default(false);
        $table->date('batisa_daty')->nullable();
        $table->string('batisa_toerana')->nullable();
        $table->boolean('mpandray')->default(false);
        $table->date('mpandray_daty')->nullable();
        $table->string('mpandray_toerana')->nullable();
        $table->foreignId('fianakaviana_id')->nullable()->constrained('fianakaviana')->nullOnDelete();
        $table->string('andraikitra')->nullable();
        $table->string('laharana')->nullable();
        $table->text('fanamarinana')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kristianinas');
    }
};
