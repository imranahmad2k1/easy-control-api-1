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
        Schema::create('xpobjecttype', function (Blueprint $table) {
            $table->integer('OID')->primary();
            $table->string('TypeName', 254)->nullable()->unique('iTypeName_XPObjectType');
            $table->string('AssemblyName', 254)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xpobjecttype');
    }
};
