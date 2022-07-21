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
        Schema::table('guests', function (Blueprint $table) {
            $table->foreign('Address', 'FK_Guests_Address')->references('id')->on('addresses');
            $table->foreign('BillingAddress', 'FK_Guests_BillingAddress')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guests', function(Blueprint $table){
            $table->dropForeign('FK_Guests_Address');
            $table->dropForeign('FK_Guests_BillingAddress');
        });
    }
};
