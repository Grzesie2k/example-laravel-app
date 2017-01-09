<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->string('name');
        });

        DB::table('questions')->insert(['quiz_id' => 1, 'name' => 'W jakim ośrodku dzwięk rozchodzi się najszybciej?']);
        DB::table('questions')->insert(['quiz_id' => 1, 'name' => 'Czego jednostką w układzie SI jest Niuton[N]?']);
        DB::table('questions')->insert(['quiz_id' => 1, 'name' => 'Co jest cięższe, 1kg stali czy 1kg wody?']);

        DB::table('questions')->insert(['quiz_id' => 2, 'name' => 'Podchodzi do Ciebie obcy kot, co robisz?']);
        DB::table('questions')->insert(['quiz_id' => 2, 'name' => 'Wstajesz rano, kiedy dasz kotu jeść?']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
