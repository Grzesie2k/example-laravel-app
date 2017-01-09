<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->string('name');
            $table->decimal('value');
        });

        DB::table('responses')->insert(['question_id' => '1', 'name' => 'Stal', 'value' => 1]);
        DB::table('responses')->insert(['question_id' => '1', 'name' => 'Woda', 'value' => 0]);
        DB::table('responses')->insert(['question_id' => '1', 'name' => 'Powietrze', 'value' => 0]);

        DB::table('responses')->insert(['question_id' => '2', 'name' => 'Masy', 'value' => 0]);
        DB::table('responses')->insert(['question_id' => '2', 'name' => 'Siły', 'value' => 1]);
        DB::table('responses')->insert(['question_id' => '2', 'name' => 'Ciepła', 'value' => 0]);

        DB::table('responses')->insert(['question_id' => '3', 'name' => 'Stal', 'value' => 0]);
        DB::table('responses')->insert(['question_id' => '3', 'name' => 'Woda', 'value' => 0]);
        DB::table('responses')->insert(['question_id' => '3', 'name' => 'Mają tą samą masę', 'value' => 1]);

        DB::table('responses')->insert(['question_id' => '4', 'name' => 'Głaszczesz', 'value' => 1]);
        DB::table('responses')->insert(['question_id' => '4', 'name' => 'Ignorujesz', 'value' => 0.5]);
        DB::table('responses')->insert(['question_id' => '4', 'name' => 'Uciekasz', 'value' => 0]);
        DB::table('responses')->insert(['question_id' => '4', 'name' => 'Próbujesz go odstraszyć', 'value' => 0]);

        DB::table('responses')->insert(['question_id' => '5', 'name' => 'Natychiast', 'value' => 1]);
        DB::table('responses')->insert(['question_id' => '5', 'name' => 'Gdy będę w kuchni', 'value' => 0.5]);
        DB::table('responses')->insert(['question_id' => '5', 'name' => 'Wcale, niech sobie radzi', 'value' => 0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('responses');
    }
}
