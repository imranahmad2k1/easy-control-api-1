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
        Schema::create('properties', function (Blueprint $table) {
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
            $table->string('PropertyName', 100)->nullable();
            $table->char('PropertyPrivateKey', 38)->nullable();
            $table->longText('Description')->nullable();
            $table->string('BeneficiaryName', 100)->nullable();
            $table->string('RegisterationNo1', 100)->nullable();
            $table->string('RegisterationNo2', 100)->nullable();
            $table->string('RegisterationNo3', 100)->nullable();
            $table->string('RegisterationNo4', 100)->nullable();
            $table->string('RegisterationNo5', 100)->nullable();
            $table->longText('LogoImgPath')->nullable();
            $table->char('Room', 38)->nullable();
            $table->char('PropertyGrade', 38)->nullable();
            $table->char('PropertyType', 38)->nullable();
            $table->char('Address', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_Properties');
            
            $table->foreign('PropertyGrade', 'FK_Properties_PropertyGrade')->references('id')->on('propertygrades');
            $table->foreign('PropertyType', 'FK_Properties_PropertyType')->references('id')->on('propertytypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
