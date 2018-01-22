import * as types from "./types";

const mutations = {
    [types.SET_NAME](state, name) {
        state.name = name;
    }
};

export default mutations;