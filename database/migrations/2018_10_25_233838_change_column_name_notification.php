<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("notifications", function (Blueprint $table){
            $table->renameColumn('type', 'notifiable_type');
            $table->renameColumn('associate_id', 'notifiable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("notifications", function (Blueprint $table){
            $table->renameColumn('notifiable_type','type');
            $table->renameColumn('notifiable_id' , 'associate_id');
        });
    }
}
