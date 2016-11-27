export default {
    isAppReady(state) {
        return state.appState.ready;
    },
    isAppLoading(state) {
        return state.appState.loading;
    }
};
