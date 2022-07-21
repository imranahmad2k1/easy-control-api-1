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
        Schema::table('seasontypes', function (Blueprint $table) {
            $table->foreign('Season', 'FK_SeasonTypes_Season')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seasontypes', function(Blueprint $table){
            $table->dropForeign('FK_SeasonTypes_Season');
        });
    }
};
