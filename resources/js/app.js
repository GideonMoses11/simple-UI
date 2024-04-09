/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue').default;

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';


Vue.component('add-user', require('./components/AddUser.vue').default);

Vue.use(VueToast);


const app = new Vue({
    el: '#app',
});
