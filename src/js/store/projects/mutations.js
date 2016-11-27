export default {
    setAppReady(state, appState) {
        state.appState.ready = appState;
    },
    setAppLoading(state, appLoading) {
        state.appState.loading = appLoading;
    }
};
