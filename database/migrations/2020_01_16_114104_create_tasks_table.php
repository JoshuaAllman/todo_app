<?php

use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 

class CreateTasksTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->string('title'); 
            $table->dateTime('completed_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks'); //'dropIfExists' will check if the table exists in the database before dropping it. When the table is dropped, itself and the data inside is permenantly deleted from the database. If it does exist, then the table will be dropped. However, if it does not exist, no error will be thrown and no action will be taken. In MySQL, you can also remove multiple tables using a single 'DROP TABLE' statement, each table is separated by a comma (,). 'dropIfExists' is a much easier and faster method to use instead of 'DRROP TABLE' in which tables would be required to be individually listed. 
    }
}

