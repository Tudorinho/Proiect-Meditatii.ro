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
        Schema::table('users', function (Blueprint $table) {
            $table->string('numar_telefon')->nullable()->after('email');
            // Adaugă atributul 'rol'
            $table->enum('rol', ['student', 'profesor'])->default('student');

            // Adaugă atributul 'sex'
            $table->enum('sex', ['barbat', 'femeie', 'altul'])->default('barbat');
            // Adăugați aici și alte atribute necesare.
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // În cazul în care trebuie să faceți o migrare inversă, puteți utiliza această metodă.
        Schema::table('users', function (Blueprint $table) {
            // Elimină atributul 'numar_telefon'
            $table->dropColumn('numar_telefon');

            // Elimină atributul 'rol'
            $table->dropColumn('rol');

            // Elimină atributul 'sex'
            $table->dropColumn('sex');
        //
    });
    }
};
