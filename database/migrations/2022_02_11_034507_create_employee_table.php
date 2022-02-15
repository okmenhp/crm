<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->mediumText('avatar')->nullable();      
            $table->date('birthday')->nullable();
            $table->string('folk')->nullable();         //Dân tộc
            $table->integer('gender')->nullable();
            $table->string('uid')->nullable();  
            $table->string('code')->nullable();         //Mã nv
            $table->string('checkin_code')->nullable(); //Mã chấm công
            $table->string('date_range')->nullable();   //Ngày cấp cccd
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('social')->nullable();       //mxh
            $table->string('tax_code')->nullable();     //Mã số thuế
            $table->date('day_in')->nullable();         //Ngày vào
            $table->string('contacter')->nullable();      //Ng liên hệ
            $table->string('contacter_phone')->nullable();      //Ng liên hệ
            $table->integer('status')->nullable();      //Ng liên hệ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
