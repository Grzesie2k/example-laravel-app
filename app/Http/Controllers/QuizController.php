<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Question;
use App\Quiz;
use App\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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
        $responses = array_map(function ($responseId) use ($quizId) {
            return Response::findOrFail($responseId);
        }, $request->get('responses', []));

        $total = array_sum(array_map(function ($response) {
            return $response->value;
        }, $responses));

        $mark = Mark::where('quiz_id', $quizId)->where('value', '<=', $total)
            ->orderBy('value', 'desc')
            ->firstOrFail();

        return response()->json([
            'total' => $total,
            'mark' => $mark
        ]);
    }
}
