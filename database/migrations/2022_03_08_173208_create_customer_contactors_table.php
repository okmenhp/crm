<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerContactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_contactors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->tinyInteger('gender')->comment('1: Name, 2: Nữ');
            $table->date('date_of_birth');
            $table->string('id_card');
            $table->string('phone_number');
            $table->string('email');
            $table->string('skype');
            $table->string('zalo');
            $table->string('wechat');
            $table->string('whatsapp');
            $table->string('address');
            $table->string('country_id');
            $table->bigInteger('customer_id');
            $table->timestamps();
            // $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_contactors');
    }
}
