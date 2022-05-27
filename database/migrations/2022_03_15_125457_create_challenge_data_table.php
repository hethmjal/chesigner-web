<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenge_id')->constrained('challenges')->cascadeOnDelete();
            $table->string('Formal');
            $table->string('Unformal');
            $table->string('Symbolic');
            $table->string('Text');
            $table->string('Geometreic');
            $table->string('Free');
            $table->string('Classic');
            $table->string('Modern');
            $table->string('Luxury');
            $table->string('Economy');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenge_data');
    }
}