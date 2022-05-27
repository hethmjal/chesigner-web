<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscriptions_id')->constrained('subscriptions')->cascadeOnDelete();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->integer('numberOfWorks');
            $table->integer('done');
            $table->integer('left');
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
        Schema::dropIfExists('sub_works');
    }
}