require('./bootstrap');

import Vue  from "vue";
import VModal from 'vue-js-modal'
Vue.use(VModal)

import App from './vue/app'

const app = new Vue({
    el: "#app",
    components: {App}
})
