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
        Schema::create('checkout', function (Blueprint $table) {
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
            $table->string('TrackingID', 100)->nullable();
            $table->string('InvoiceNo', 100)->nullable();
            $table->dateTime('CheckedInDate');
            $table->dateTime('CheckOutDate');
            $table->integer('NoOfNightsStayed')->nullable();
            $table->integer('IsInvoiceToSamePerson')->nullable();
            $table->string('Remarks', 100)->nullable();
            $table->char('CheckIn', 38)->nullable();
            $table->char('PaymentType', 38)->nullable();
            $table->char('InvoiceTo', 38)->nullable();
            $table->integer('OptimisticLockField')->nullable();
            $table->integer('GCRecord')->nullable()->index('iGCRecord_CheckOut');
            
            $table->foreign('CheckIn', 'FK_CheckOut_CheckIn')->references('id')->on('checkin');
            $table->foreign('InvoiceTo', 'FK_CheckOut_InvoiceTo')->references('id')->on('guests');
            $table->foreign('PaymentType', 'FK_CheckOut_PaymentType')->references('id')->on('paymenttypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout');
    }
};
