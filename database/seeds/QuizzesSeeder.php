<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $this->createPhysicQuiz();
        });
        DB::transaction(function () {
            $this->createCatQuiz();
        });
        DB::transaction(function () {
            $this->createColorQuiz();
        });
    }

    protected function createPhysicQuiz()
    {
        $quiz = App\Quiz::create(['name' => 'Jak dobry jesteś z fizyki?', 'method_id' => App\Method::ID_SUM]);
        App\Mark::create(['name' => 'Niedostateczny', 'value' => 0, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Dostateczny', 'value' => 1, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Celujący', 'value' => 3, 'quiz_id' => $quiz->id]);

        $question = App\Question::create([
            'name' => 'W jakim ośrodku dzwięk rozchodzi się najszybciej?',
            'quiz_id' => $quiz->id,
        ]);
        App\Response::create(['name' => 'Stal', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Woda', 'value' => 0, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Powietrze', 'value' => 0, 'question_id' => $question->id]);


        $question = App\Question::create([
            'name' => 'Czego jednostką w układzie SI jest Niuton[N]?',
            'quiz_id' => $quiz->id,
        ]);
        App\Response::create(['name' => 'Masy', 'value' => 0, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Siły', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Ciepła', 'value' => 0, 'question_id' => $question->id]);

        $question = App\Question::create([
            'name' => 'Co jest cięższe, 1kg stali czy 1kg wody?',
            'quiz_id' => $quiz->id,
        ]);
        App\Response::create(['name' => 'Stal', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Woda', 'value' => 0, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Mają tą samą masę', 'value' => 0, 'question_id' => $question->id]);
    }

    protected function createCatQuiz()
    {
        $quiz = App\Quiz::create(['name' => 'Czy lubisz koty?', 'method_id' => App\Method::ID_SUM]);
        App\Mark::create(['name' => 'Przeciwnik kotów', 'value' => 0, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Koto obojętny', 'value' => 1, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Fanatyk kotów', 'value' => 2, 'quiz_id' => $quiz->id]);

        $question = App\Question::create([
            'name' => 'Podchodzi do Ciebie obcy kot, co robisz?',
            'quiz_id' => $quiz->id
        ]);
        App\Response::create(['name' => 'Głaszczesz', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Ignorujesz', 'value' => 0.5, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Uciekasz', 'value' => 0, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Próbujesz go odstraszyć', 'value' => 0, 'question_id' => $question->id]);

        $question = App\Question::create([
            'name' => 'Wstajesz rano, kiedy dasz kotu jeść?',
            'quiz_id' => $quiz->id
        ]);
        App\Response::create(['name' => 'Natychiast', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Gdy będę w kuchni', 'value' => 0.5, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Wcale, niech sobie radzi', 'value' => 0, 'question_id' => $question->id]);
    }

    protected function createColorQuiz()
    {
        $quiz = App\Quiz::create(['name' => 'Twój ulubiony kolor', 'method_id' => App\Method::ID_DOMINANT]);
        App\Mark::create(['name' => 'Czerwony', 'value' => 1, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Pomarańczowy', 'value' => 2, 'quiz_id' => $quiz->id]);
        App\Mark::create(['name' => 'Zielony', 'value' => 3, 'quiz_id' => $quiz->id]);

        $question = App\Question::create([
            'name' => 'Wybierz warzywo',
            'quiz_id' => $quiz->id
        ]);
        App\Response::create(['name' => 'Pomidor', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Marchewka', 'value' => 2, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Ogórek', 'value' => 3, 'question_id' => $question->id]);

        $question = App\Question::create([
            'name' => 'Wybierz owoc',
            'quiz_id' => $quiz->id
        ]);
        App\Response::create(['name' => 'Pomarańcza', 'value' => 2, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Truskawka', 'value' => 1, 'question_id' => $question->id]);
        App\Response::create(['name' => 'Agrest', 'value' => 3, 'question_id' => $question->id]);
    }
}
