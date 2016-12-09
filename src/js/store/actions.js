export default {
    appReady({ commit }, appState) {
        commit('setAppReady', appState);
    },
    appLoading({ commit }, appLoading) {
        commit('setAppLoading', appLoading);
    }
};
