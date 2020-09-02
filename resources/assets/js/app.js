require('./bootstrap');
require('./chart');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('navmenu-component', require('./components/Navmenu.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});

// window.Vue = require('vue');
// import Vue from 'vue'
// import ExampleComponent from './components/ExampleComponent.vue'

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('chart', require('./components/Chart.vue'));
// Vue.component('header-component', require('./components/HeaderComponent.vue').default);

// const app = new Vue({
//     el: '#app'
// });

// var app = new Vue({
//     el: '#app',
//     components: {
//         ExampleComponent,
//       }
// });