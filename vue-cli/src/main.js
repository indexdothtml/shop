import Vue from 'vue';
import Router from './router';
import Store from './store';
import Lang from './lang';
import '../../resources/assets/js/utils';
require.context('./assets', true, /^\.\//);

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