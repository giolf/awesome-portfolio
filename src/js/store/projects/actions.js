export default {
    appReady({ commit }, appState) {
        commit('setAppReady', appState);
    },
    appLoading({ commit }, appLoading) {
        commit('settAppLoading', appLoading);
    }
};
