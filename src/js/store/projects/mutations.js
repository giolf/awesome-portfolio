export default {
    setAppReady(state, appState) {
        state.appState.ready = appState;
    },
    settAppLoading(state, appLoading) {
        state.appState.loading = appLoading;
    }
};
