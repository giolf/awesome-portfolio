export default {
    moreProjects({ commit, dispatch, state }) {
        commit('setAppLoading', true);
        commit('incrementPage');
        dispatch('getProjects', {page: state.page}).then(
            () => {
                commit('setAppLoading', false);
            },
            (errors) => {
                console.log(errors);
            }
        );
    }
};
