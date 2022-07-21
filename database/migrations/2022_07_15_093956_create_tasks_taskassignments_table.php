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
        Schema::create('tasks_taskassignments', function (Blueprint $table) {
            $table->char('TaskAssignments', 38)->nullable();
            $table->char('Tasks', 38)->nullable();
            $table->uuid('id')->primary();
            $table->integer('OptimisticLockField')->nullable();
            
            $table->unique(['TaskAssignments', 'Tasks'], 'iTaskAssignmentsTasks_TasksTasks_TaskAssignmentsTas_28D77A19');
            $table->foreign('TaskAssignments', 'FK_tasks_taskassignments_TaskAssignments')->references('id')->on('taskassignments');
            $table->foreign('Tasks', 'FK_tasks_taskassignments_Tasks')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_taskassignments');
    }
};
