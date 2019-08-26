/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.fecha = require('fecha');

// import {
//     Datetime
// } from 'vue-datetime';

// Vue.component('datetime', Datetime);

// import Vue from 'vue';
// import Datetime from 'vue-datetime';
// // You need a specific loader for CSS files
// import 'vue-datetime/dist/vue-datetime.css';

// Vue.use(Datetime);

// import HotelDatePicker from 'vue-hotel-datepicker';

// export default {
//     components: {
//         HotelDatePicker
//     },
// }

// Vue.use(HotelDatePicker);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('sidebar-collapse', require('./components/SidebarCollapse.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
