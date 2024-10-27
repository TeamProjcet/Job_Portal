import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './App.vue'
import route from './Routes'

import Pagination from "./plugins/pagination/pagination";
Vue.component('pagination',Pagination);

import { Vue2TinymceEditor } from "vue2-tinymce-editor";
Vue.component('Editor', Vue2TinymceEditor);

import i18n from './localization'
Vue.use(i18n);

// common-function define and create
import httpMixin from "./Mixin/httpMxin"
import commonMixin from "./Mixin/commonMixin"
import utilshttpMixin from "../../../resources/utilsMixin/utilsHttpMixin"
import utilsCommonMixin from "../../../resources/utilsMixin/utilsCommonMixin"
Vue.mixin(httpMixin);
Vue.mixin(utilshttpMixin);
Vue.mixin(commonMixin);
Vue.mixin(utilsCommonMixin);

// store management
import Vuex from 'vuex';
Vue.use(Vuex);
import {store as storeData} from './Store';
const store = new Vuex.Store(storeData);

// input field global error handling
import VeeValidate from 'vee-validate'
Vue.use(VeeValidate, {
    events: 'input',
    fieldsBagName: ''
});

const router = new VueRouter({
    mode: 'history',
    routes: route,
    linkActiveClass: ''
});

// small common-function
import helper from './helper'
helper(store, router);

// alret massage
import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css';
Vue.use(Toast);

// alret massage
import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

import axios from "axios";



const vue = new Vue({
    el: '#app',
    components:{App},
    router, axios, store,i18n
});