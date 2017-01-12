<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Method;
use App\Question;
use App\Quiz;
use App\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getQuizzes()
    {
        $quizzes = Quiz::all();

        return response()->json($quizzes);
    }

    /**
     * @param $quizId
     * @return JsonResponse
     */
    public function getQuiz($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = array_map(function ($question) {
            return $question['id'];
        }, $quiz->questions->toArray());

        return response()->json([
            'id' => $quiz->id,
            'name' => $quiz->name,
            'questions' => $questions,
        ]);
    }

    /**
     * @param $questionId
     * @return JsonResponse
     */
    public function getQuestion($questionId)
    {
        $question = Question::with('responses')->where('id', $questionId)->firstOrFail();

        return response()->json($question);
    }

    /**
     * @param Request $request
     * @param $quizId
     * @return JsonResponse
     */
    public function getResult($quizId, Request $request)
    {
        $quiz = Quiz::findOrFail($quizId);
        $responses = $request->get('responses', []);
        $total = static::calculateResult($responses, $quiz->method);

        $mark = Mark::where('quiz_id', $quizId)->where('value', '<=', $total)
            ->orderBy('value', 'desc')
            ->firstOrFail();

        return response()->json([
            'total' => $total,
            'mark' => $mark
        ]);
    }

    /**
     * @param int[] $responses
     * @param Method $method
     * @throws \Exception
     * @return float
     */
    protected static function calculateResult(array $responses, Method $method) {
        switch ($method->id) {
            case Method::ID_SUM:
                return Response::findOrFail($responses)->sum('value');
            case Method::ID_DOMINANT:
                return DB::table('responses')
                    ->select('value', 'question_id', DB::raw('count(id) as total'))
                    ->whereIn('id', $responses)
                    ->groupBy('value')->orderBy('total', 'DESC')
                    ->groupBy('question_id')->orderBy('question_id')
                    ->value('value');
            default:
                throw new \Exception("Unknown aggregate function.");
        }
    }
}
