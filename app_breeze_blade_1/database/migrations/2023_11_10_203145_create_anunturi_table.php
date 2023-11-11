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
        Schema::create('anunturi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Adaugă această linie pentru a crea o cheie externă către tabela 'users'
            $table->string('titlu');
            $table->text('continut');
            $table->string('subiect');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anunturi');
    }
};
