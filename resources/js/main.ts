import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import http from './http-common';
import {Store} from 'vuex';


const app = createApp(App);

declare module '@vue/runtime-core' {
    export interface ComponentCustomProperties {
        $store: Store<any>
    }
}

app.use(store);

app.use(router);
app.provide('$api', http);

app.mount('#app');
