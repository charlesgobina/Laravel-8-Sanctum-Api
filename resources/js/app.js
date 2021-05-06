require('./bootstrap');

import Vue from 'vue'

import App from './vue/app'

import Lapp from './vue/lapp'


const app = new Vue({
    el: '#app',
    components: { App }
}); 

const lapp = new Vue({
    el: '#lapp',
    components: { Lapp }
}); 