<?php

class QuizTest extends TestCase
{
    public function testGetQuizzes()
    {
        $this->get('/api/quizzes');
        $this->assertResponseOk();
        $this->isJson();
    }

    public function testGetQuiz()
    {
        $endpoint = '/api/quiz/';
        $this->get($endpoint . PHP_INT_MAX);
        $this->assertResponseStatus(404);
        $this->isJson();

        $this->get($endpoint . 1);
        $this->assertResponseOk();
        $this->isJson();
        $quiz = json_decode($this->response->content(), true);
        $this->assertArrayHasKey('questions', $quiz);
        $this->assertInternalType('array', $quiz['questions']);
        $this->assertArrayHasKey('id', $quiz);
        $this->assertArrayHasKey('name', $quiz);
    }

    public function testGetQuestion()
    {
        $endpoint = '/api/question/';
        $this->get($endpoint.PHP_INT_MAX);
        $this->assertResponseStatus(404);
        $this->isJson();

        $this->get($endpoint . 1);
        $this->assertResponseOk();
        $this->isJson();
        $question = json_decode($this->response->content(), true);
        $this->assertArrayHasKey('id', $question);
        $this->assertArrayHasKey('name', $question);
        $this->assertArrayHasKey('responses', $question);
        $this->assertNotEmpty($question['responses'], 'has responses');

        foreach($question['responses'] as $response) {
            $this->assertInternalType('array', $response);
            $this->assertArrayHasKey('id', $response);
            $this->assertArrayHasKey('name', $response);
            $this->assertArrayNotHasKey('value', $response);
        }

    }
}
