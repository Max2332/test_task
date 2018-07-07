<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSearchResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('response');
            $table->integer('fragment_id');
            $table->foreign('fragment_id')->references('id')->on('fragments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('search_result');
    }
}
