<template>
    <div>
        <select-quiz v-if="!quiz"
                     v-on:select="selectQuiz"
        ></select-quiz>
        <div v-if="quiz">
            <h1>
                {{ quiz.name }}
                <small v-if="!showResult">Pytanie {{questionNumber}} z {{quiz.questions.length}}</small>
            </h1>
            <question v-if="question"
                      v-bind:items="question.responses"
                      v-bind:title="question.name"
                      v-on:input="selectResponse"
            ></question>
            <result v-if="showResult"
                    v-bind:quiz="quiz"
                    v-bind:responses="responses"
            ></result>
            <button v-on:click="reset"
                    title="Lista quizów"
                    class="btn btn-default pull-left">
                Powrót
            </button>
        </div>
    </div>
</template>

<script>
    import Api from '../Api.js';

    export default {
        data() {
            return {
                quiz: null,
                question: null,
                questionNumber: 0,
                responses: []
            };
        },
        computed: {
            showResult(){
                return this.responses.length === this.quiz.questions.length;
            }
        },
        methods: {
            selectQuiz(quiz) {
                this.quiz = quiz;
                this.questionNumber = 0;
                this.nextQuestion();
            },
            selectResponse(response) {
                this.question = null;
                this.responses.push(response.id);
                this.nextQuestion();
            },
            nextQuestion() {
                this.question = null;
                if (this.questionNumber >= this.quiz.questions.length) {
                    return;
                }
                var questionId = this.quiz.questions[this.questionNumber];
                return Api.getQuestion(questionId)
                    .then((question) => {
                        this.question = question;
                        this.questionNumber++;
                    })
            },
            reset() {
                this.quiz = null;
                this.question = null;
                this.responses = [];
            }
        },
        components: {
            question: require('./Question.vue'),
            result: require('./Result.vue'),
            selectQuiz: require('./SelectQuiz.vue')
        }
    }
</script>

<style scoped>
.container {
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>