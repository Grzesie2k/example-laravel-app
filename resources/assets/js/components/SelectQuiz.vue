<template>
    <div>
        <h1>
            Quiz
        </h1>
        <question title="Wybierz zestaw pytań"
                  v-on:input="selectQuiz"
                  v-bind:items="quizzes"
        ></question>
   </div>
</template>

<script>
import Api from '../Api.js';

export default {
    data() {
        return {
            quizzes: []
        }
    },
    mounted() {
        return Api.getQuizzes()
            .then((quizzes) => {
                this.quizzes = quizzes;
            });
    },
    methods: {
        selectQuiz(quiz) {
            return Api.getQuiz(quiz.id)
                .then((quiz) => this.$emit('select', quiz));
        }
    },
    components: {
        'question': require('./Question.vue')
    }
}
</script>