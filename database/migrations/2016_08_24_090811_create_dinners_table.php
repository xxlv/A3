<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinners', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('uid');
            $table->string('email');
            $table->string('name');
            $table->boolean('auto_report');
            $table->date('begin_at');
            $table->date('end_at');

            $table->time('dinner_time');
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
        Schema::drop('dinners');
    }
}
