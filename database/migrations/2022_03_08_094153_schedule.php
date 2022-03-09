<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('schedule');
        Schema::create('schedule', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->unsignedInteger('uid')->nullable();
            $table->string('title')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('location')->nullable();
            $table->integer('meeting_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('pattern')->default('1');
            $table->string('wday')->nullable();
            $table->string('mday')->nullable();
            $table->integer('type_id')->nullable();
            $table->boolean('all_day')->default('0');
            $table->timestamps();
        });
        Schema::create('meeting', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('type_schedule', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('user_schedule', function (Blueprint $table) 
        {
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('user_id');
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
        //
    }
}
