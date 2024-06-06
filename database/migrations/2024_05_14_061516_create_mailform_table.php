<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailform', function (Blueprint $table) {
            //id
            $table->increments('id');
            //name
            $table->string('name',30);
            //email
            $table->string('email',120);
            //sex　(男性1,女性2)
            $table->integer('sex')->default(1);
            //category (複数選択可)
            $table->integer('category');
            //pref お住まい
            $table->integer('pref');
            //message 
            $table->string('message',120);
            //image_path
            $table->string('image_path',60);
            //created_at , update_at
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
        Schema::dropIfExists('mailform');
    }
}
