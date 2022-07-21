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
        Schema::create('housekeepingtasks_housekeepers', function (Blueprint $table) {
            $table->char('HouseKeepers', 38)->nullable();
            $table->char('HouseKeepingTasks', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['HouseKeepers', 'HouseKeepingTasks'], 'iHouseKeepersHouseKeepingTasks_HouseKeepingTaskHouseK_43835BFA');
            $table->foreign('HouseKeepers')->references('id')->on('housekeepers');
            $table->foreign('HouseKeepingTasks')->references('id')->on('housekeepingtasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('housekeepingtask_housekeepers');
    }
};
