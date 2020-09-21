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