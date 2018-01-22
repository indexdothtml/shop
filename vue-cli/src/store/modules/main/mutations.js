// Import mutation's types
import { SOME_EXAMPLE_TYPE } from './types.js';

const mutations = {
    // Example mutation
    [SOME_EXAMPLE_TYPE](state, payload) {
        // do something with store
        state.some_state = payload;
    }
};

export default mutations;
