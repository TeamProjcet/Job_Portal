import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './App.vue'
import route from './Routes'

import axios from 'axios';
import vueAxios from 'vue-axios';
Vue.use( vueAxios,axios);

import httpMxin from './Mixin/httpMxin';
import commonMixin from './Mixin/commonMixin';
Vue.mixin(httpMxin);
Vue.mixin(commonMixin);

import Vuex from 'vuex'
Vue.use(Vuex);

import {store as storeData} from './Store';
const store=new Vuex.Store(storeData);

import veeValidate from 'vee-validate';
Vue.use(veeValidate,{
    events:'input',
    fieldsBagName:''
});




const router = new VueRouter({
    mode: 'history',
    routes: route,
    linkActiveClass: 'active'
});

const vue = new Vue({
    el: '#app',
    components:{App},
    router,axios,store
});