import Vue from 'vue';
import Router from './router';
import Store from './store';
import Lang from './lang';
import './utils';

// Bootstrap component
import App from './App.vue';

// Create vue instance
new Vue({
    el: '#app',
    router: Router,
    store: Store,
    i18n: Lang,
    render: h => h(App)
});

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';