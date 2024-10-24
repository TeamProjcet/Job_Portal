// vue import and use
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import App from './App.vue'

// vue routing path index.js
import route from './Routes'

// api handling
import axios from "axios"
import VueAxios from "vue-axios"
Vue.use(VueAxios, axios)

import { Vue2TinymceEditor } from "vue2-tinymce-editor";
Vue.component('Editor', Vue2TinymceEditor);

import Pagination from "./plugins/pagination/pagination";
Vue.component('pagination',Pagination);


// common-function define and create
import httpMixin from "./Mixin/httpMxin"
import commonMixin from "./Mixin/commonMixin"
import utilshttpMixin from "../../../resources/utilsMixin/utilsHttpMixin"
import utilsCommonMicin from "../../../resources/utilsMixin/utilsCommonMixin"

Vue.mixin(httpMixin);
Vue.mixin(utilshttpMixin);
Vue.mixin(commonMixin);
Vue.mixin(utilsCommonMicin);

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

// router mode history And hash#
const router = new VueRouter({
    mode: 'history',
    routes: route,
    linkActiveClass: 'active'
});



// small common-function
import helper from './helper'
helper(store, router);

// alret massage
import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css';
Vue.use(Toast);

// alret massage
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);
import 'sweetalert2/dist/sweetalert2.min.css';

const vue = new Vue({
    el: '#app',
    components: {App},
    router, axios, store
});
