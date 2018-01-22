// Import example mutation's types
import { SOME_EXAMPLE_TYPE } from './types.js';

const actions = {
    // Exmpale action
    someAction({ commit, dispatch, state }, payload) {
        // Commit the mutation
        commit(SOME_EXAMPLE_TYPE, payload);
    }
};

export default actions;
