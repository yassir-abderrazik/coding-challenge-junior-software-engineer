/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import { createApp } from 'vue';
import * as vueRouter from 'vue-router';
import { routes } from './routes';


import App from './components/App.vue';


const router = vueRouter.createRouter({
    history: vueRouter.createWebHistory(),
    routes
});

createApp(App).use(router).mount('#app');