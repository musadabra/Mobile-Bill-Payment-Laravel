require('./bootstrap');
import router from './routes';
import Vue from 'vue';
import VueRouter from 'vue-router';
// import the styles 

window.Vue = require('vue');

Vue.component('error-modal', require('./components/ErrorModal.vue').default); 
Vue.component('new-error-modal', require('./components/NewErrorModal.vue').default);
Vue.component('success-modal', require('./components/SuccessModal.vue').default);
Vue.component('new-success-modal', require('./components/NewSuccessModal.vue').default);

Vue.use(VueRouter);
new Vue({
	router
}).$mount('#app');