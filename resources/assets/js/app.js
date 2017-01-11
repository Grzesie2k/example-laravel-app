Vue.component('app', require('./components/App.vue'));
Vue.component('question', require('./components/Question.vue'));
Vue.component('selectQuiz', require('./components/SelectQuiz.vue'));
Vue.component('result', require('./components/Result.vue'));

const app = new Vue({
    el: '#app'
});
