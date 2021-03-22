/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import Vue from 'vue'
window.Vue = Vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 window.axios = require('axios');

 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Lista', require('./components/Lista.vue').default);
Vue.component('Editar', require('./components/Editar.vue').default);
Vue.component('Paginacion', require('./components/paginacion.vue').default);
Vue.component('Item', require('./components/Items.vue').default);

const app = new Vue({
    el: '#app',
    data: function () {
        return {
            mode: 'crear',
            id : '',
            title : '',
            content :''
        }
      },
      methods:{
        loadList: function (e){
            console.log('list');
        }
      },
      mounted() {
      }
});
