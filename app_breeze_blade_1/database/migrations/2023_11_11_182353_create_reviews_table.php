<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('elev_id')->constrained('users');
            $table->foreignId('profesor_id')->constrained('users');
            $table->text('mesaj');
            $table->integer('rating');
            $table->integer('nota');
            // Alte câmpuri specifice review-ului
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
