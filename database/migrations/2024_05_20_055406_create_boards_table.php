<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            // id
            $table->increments('id');
            // name
            $table->string('name',30);
            // subject
            $table->string('subject',120);
            // message
            $table->text('message');
            // image_path
            $table->string('image_path',60);
            // email
            $table->string('email',129);
            //url
            $table->string('url',300);
            // text_color
            $table->string('text_color',30);
            // delete_key
            $table->string('delete_key',8);
            // created_at
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
        Schema::dropIfExists('boards');
    }
}
