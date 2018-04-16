<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDueDateToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add due date
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->datetime('due_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->dropColumn('due_time');
        });
    }
}
