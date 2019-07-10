<?php
// Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridColumnToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('reader_id')->unsigned()->default(1);
            $table->foreign('reader_id')
                ->references('id')->on('users')->nullable()
                // ->onDelete('cascade')
                ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('reader_id');
        });
    }
}
