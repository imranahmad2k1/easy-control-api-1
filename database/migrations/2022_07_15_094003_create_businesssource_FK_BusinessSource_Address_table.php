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
        Schema::table('businesssource', function (Blueprint $table) {
            $table->foreign('Address', 'FK_BusinessSource_Address')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesssource', function(Blueprint $table){
            $table->dropForeign('FK_BusinessSource_Address');
        });
    }
};
