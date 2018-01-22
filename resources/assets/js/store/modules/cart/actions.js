import * as types from "./types";

const actions = {
    setName ({ commit }, name) {
        commit(types.SET_NAME, name);
    }
};

export default actions;