<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/quizzes', 'QuizController@getQuizzes');
Route::get('/quiz/{quizId}', 'QuizController@getQuiz');
Route::get('/question/{questionId}', 'QuizController@getQuestion');
Route::put('/result/{quizId}', 'QuizController@getResult');