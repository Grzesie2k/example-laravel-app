<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    const TABLE = 'marks';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->string('name');
            $table->decimal('value');
        });

        DB::table('marks')->insert(['quiz_id' => 1, 'name' => 'Niedostateczny', 'value' => 0]);
        DB::table('marks')->insert(['quiz_id' => 1, 'name' => 'Dostateczny', 'value' => 1]);
        DB::table('marks')->insert(['quiz_id' => 1, 'name' => 'Celujący', 'value' => 3]);

        DB::table('marks')->insert(['quiz_id' => 2, 'name' => 'Przeciwnik kotów', 'value' => 0]);
        DB::table('marks')->insert(['quiz_id' => 2, 'name' => 'Koto obojętny', 'value' => 1]);
        DB::table('marks')->insert(['quiz_id' => 2, 'name' => 'Fanatyk kotów', 'value' => 2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marks');
    }
}
