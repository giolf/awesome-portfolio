export default {
    more({ commit, dispatch, state }) {
        commit('setAppLoading', true);
        commit('incrementPage');
        dispatch(state.config.actionToCall, {page: state.page}).then(
            () => {
                commit('setAppLoading', false);
            },
            (errors) => {
                console.log(errors);
            }
        );
    },
    config({ commit, state}, config) {
        commit('setConfig', config);
    }
};
