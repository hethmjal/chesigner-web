<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('designer_id')->constrained('users');
            $table->foreignId('order_id')->constrained('orders');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_ext')->nullable();
            $table->enum('status',['Accepted','need to edit','working on','under review']);
            $table->text('designer_note')->nullable();
            $table->text('user_note')->nullable();
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
        Schema::dropIfExists('order__works');
    }
}