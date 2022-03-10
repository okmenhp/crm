<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('customer_type_id')->nullable();
            $table->string('tax_number')->NULL;
            $table->string('phone_number')->NULL;
            $table->string('email')->NULL;
            $table->string('skype')->NULL;
            $table->string('zalo')->NULL;
            $table->string('wechat')->NULL;
            $table->string('whatsapp')->NULL;
            $table->string('address')->NULL;
            $table->integer('country_id')->NULL;
            $table->tinyInteger('status')->comment('1: CONFIRMED, 0: NEW, 2: CANCEL')->default(0);
            $table->timestamps();
            // $table->foreign('customer_type_id')->references('id')->on('customer_types');
            // $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
