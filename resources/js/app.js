require('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('maintenance-component', require('./components/Maintenance.vue').default);
Vue.component('product-component', require('./components/Product.vue').default);
Vue.component('analytics-component', require('./components/Analytics.vue').default);
Vue.component('productmodal-component', require('./components/ProductModal.vue').default);
Vue.component('sales-component', require('./components/Sales.vue').default);
Vue.component('imagepreview-component', require('./components/ImagePreview.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});
