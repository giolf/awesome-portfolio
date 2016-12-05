import Vue from 'vue';
import Vuex from 'vuex';
// Store
import appState from './state';
import appGetters from './getters';
import appActions from './actions';
import appMutations from './mutations';
// Table module
import projectsModule from '../modules/projects/module';
// More module
import moreModule from '../modules/more/module';

Vue.use(Vuex);

export default new Vuex.Store({
    state: appState,
    getters: appGetters,
    actions: appActions,
    mutations: appMutations,
    modules: {
        projectsModule: projectsModule,
        moreModule: moreModule
    }
});
