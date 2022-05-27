<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('designer_id')->constrained('users');
            $table->string('designer_name');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('type');
            $table->date('deadline');
            $table->enum('status',['waiting to response','Accepted','Rejected'])->default('waiting to response');
            $table->enum('work_submitted',['working on','submitted','Delayed'])->default('working on');
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
        Schema::dropIfExists('orders');
    }
}