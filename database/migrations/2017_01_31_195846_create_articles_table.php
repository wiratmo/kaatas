<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            /*meta*/
            $table->string('title', 50);
            $table->string('keyword');
            $table->string('description');
            /*content*/
            $table->string('name', 50);
            $table->string('monthYear', 10);
            $table->longText('content');
            $table->integer('attendance')->default(0);
            $table->enum('status',['draf','posted']);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'monthYear']);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
