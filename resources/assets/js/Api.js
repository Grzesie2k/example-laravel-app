import Config from './Config';

export default {
    http: Vue.http,
    prefix: Config.endpoint,
    getQuizzes() {
        let url = [this.prefix, 'quizzes'].join('/');
        return this.http.get(url)
            .then((response) => response.body);
    },
    getQuiz(quizId) {
        let url = [this.prefix, 'quiz', quizId].join('/');
        return this.http.get(url)
            .then((response) => response.body);
    },
    getQuestion(questionId) {
        let url = [this.prefix, 'question', questionId].join('/');
        return this.http.get(url)
            .then((response) => response.body);
    },
    createResult(quizId, responses) {
        let url = [this.prefix, 'result', quizId].join('/');
        return  this.http.put(url, {responses: responses})
            .then((response) => response.body);
    }

}
