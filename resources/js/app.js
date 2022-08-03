import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'
import { createHead } from '@vueuse/head'
import Apps from './App.vue'
import ViewUIPlus from 'view-ui-plus'
import locale from 'view-ui-plus/dist/locale/en-US';
import router from "./router";
import store from "./store";
import 'view-ui-plus/dist/styles/viewuiplus.css'
import apiService from './Helpers/apiService';
const app = createApp({})
const head = createHead()
app.use(store);
app.use(router);
app.use(head);
app.use(ViewUIPlus, { locale });
app.mixin(apiService);
app.component('main-content', Apps);

app.mount('#app');
