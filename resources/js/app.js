import { createApp } from 'vue';
import axios from 'axios';
import vuex from './Components/store/index';
import router from './Components/Router';
import Master from './Components/Master.vue';
createApp(Master).use(router).use(vuex).mount('#app');
require('./bootstrap');
