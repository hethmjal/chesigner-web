<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('designer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('subscriptions_id')->constrained('subscriptions')->cascadeOnDelete();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->string('work_image')->nullable();
            $table->string('work_file')->nullable();
            $table->string('type');
            $table->string('user_note')->nullable();
            $table->string('designer_note')->nullable();
            $table->enum('work_status',['Accepted','need to edit','working on','under review'])->default('working on');
            $table->date('deadline');
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
        Schema::dropIfExists('sub_orders');
    }
}