// require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import VueI18Next from '@panter/vue-i18next';

import './vendor.js'

import App from './App.vue';
import router from './router';
import i18next from './i18n.js';
import store from './store';

Vue.use(BootstrapVue);
Vue.use(VueI18Next);

const i18n = new VueI18Next(i18next);

new Vue({
    i18n,
    router,
    store,
    ...App
}).$mount('#app');
