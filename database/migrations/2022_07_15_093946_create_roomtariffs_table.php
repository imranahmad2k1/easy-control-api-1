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
        Schema::create('roomtariffs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('IsActive')->nullable();
            $table->char('PropertyID', 38)->nullable();
            $table->char('CreatedBy', 38)->nullable();
            $table->dateTime('CreatedDate');
            $table->char('LastUpdatedBy', 38)->nullable();
            $table->dateTime('LastUpdatedDate');
            $table->string('CreatedByName', 100)->nullable();
            $table->string('LastUpdatedByName', 100)->nullable();
            $table->integer('SortKey')->nullable();
            $table->string('Name', 100)->nullable();
            $table->decimal('Tariff', 28, 8)->nullable();
            $table->decimal('ExtraAdults', 28, 8)->nullable();
            $table->decimal('ExtraChilds', 28, 8)->nullable();
            $table->integer('IsBusinessSourceRate')->nullable();
            $table->char('RoomType', 38)->nullable();
            $table->char('RateType', 38)->nullable();
            $table->char('MarketPlace', 38)->nullable();
            $table->char('BusinessSource', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_RoomTariff');
            
            $table->foreign('BusinessSource', 'FK_RoomTariff_BusinessSource')->references('id')->on('businesssource');
            $table->foreign('MarketPlace', 'FK_RoomTariff_MarketPlace')->references('id')->on('marketplace');
            $table->foreign('RateType', 'FK_RoomTariff_RateType')->references('id')->on('roomratetypes');
            $table->foreign('RoomType', 'FK_RoomTariff_RoomType')->references('id')->on('roomtypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomtariff');
    }
};
