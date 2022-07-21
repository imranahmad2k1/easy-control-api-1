<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('BillingGuest', 'FK_Addresses_BillingGuest')->references('id')->on('guests');
            $table->foreign('Guest', 'FK_Addresses_Guest')->references('id')->on('guests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign('FK_Addresses_BillingGuest');
            $table->dropForeign('FK_Addresses_Guest');
        });
    }
};