<template>
    <div class="jumbotron">
        <h2>
            Koniec
            <br>
            <small>Dziękujemy za udzielone odpowiedzi</small>
        </h2>
        <h3>Ocena:</h3>
        <p v-if="result">{{ result.mark.name }}</p>
    </div>
</template>

<script>
import Api from '../Api.js';

export default {
    props: ['quiz', 'responses'],
    data() {
        return {
            result: null
        };
    },
    mounted() {
        this.showResult();
    },
    methods: {
        showResult() {
            Api.createResult(this.quiz.id, this.responses)
                .then((result) => this.result = result);
        }
    }
}
</script>