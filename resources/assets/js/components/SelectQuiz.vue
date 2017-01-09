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
export default {
    data() {
        return {
            quizzes: []
        }
    },
    mounted() {
        this.$http.get('/api/quizzes')
            .then((response) => {
                this.quizzes = response.body;
            });
    },
    methods: {
        selectQuiz(quiz) {
            this.$http.get(`/api/quiz/${quiz.id}`)
                .then((response) => {
                    this.$emit('select', response.body);
                });
        }
    }
}
</script>