import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './App.vue'
import route from './Routes'

import axios from "axios"
import VueAxios from "vue-axios"

Vue.use(VueAxios, axios)

import httpMixin from "./Mixin/httpMxin"
import commonMixin from "./Mixin/commonMixin"

Vue.mixin(httpMixin)
Vue.mixin(commonMixin)

import Vuex from 'vuex';

Vue.use(Vuex);

import {store as storeData} from './Store';

const store = new Vuex.Store(storeData);


import VeeValidate from 'vee-validate'

Vue.use(VeeValidate, {
    events: 'input',
    fieldsBagName: ''
});


const router = new VueRouter({
    mode: 'history',
    routes: route,
    linkActiveClass: 'active'
});




// import helper from './helper'
// helper(store, router);

import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css';
Vue.use(Toast);

import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);
import 'sweetalert2/dist/sweetalert2.min.css';

const vue = new Vue({
    el: '#app',
    components: {App},
    router, axios, store
});