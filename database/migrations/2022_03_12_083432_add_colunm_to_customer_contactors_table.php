<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmToCustomerContactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_contactors', function (Blueprint $table) {
            //
            $table->bigInteger('customer_type_id')->nullable()->after('name');
            $table->string('position')->after('customer_type_id')->NULL;
            $table->string('note')->after('country_id')->NULL;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_contactors', function (Blueprint $table) {
            //
            $table->dropColumn('customer_type_id');
            $table->dropColumn('position');
            $table->dropColumn('note');
        });
    }
}
