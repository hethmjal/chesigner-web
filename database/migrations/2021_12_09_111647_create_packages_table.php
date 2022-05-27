<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->integer('number_of_works');
            $table->integer('single_work_editing');
            $table->enum('change_designer',['available','Not available']);
            $table->enum('unsubscribe',['available','Not available']);          
            $table->enum('meeting_schedule',['available','Not available']);
            $table->enum('screen_share_technology',['available','Not available']);
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
        Schema::dropIfExists('packages');
    }
}