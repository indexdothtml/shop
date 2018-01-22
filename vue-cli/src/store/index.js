import Vue from 'vue';
import Vuex from 'vuex';

// Register vuex
Vue.use(Vuex);

// Import main module
import main from './modules/main';

// Import other modules
import modules from './modules';

// Create store instance
const store = new Vuex.Store({
    modules,
    state: main.state,
    mutations: main.mutations,
    actions: main.actions,
    getters: main.getters
});

export default store;
