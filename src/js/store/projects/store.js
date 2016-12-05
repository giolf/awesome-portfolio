import Vue from 'vue';
import Vuex from 'vuex';
// Store
import mainState from '../projects/state';
import mainGetters from '../projects/getters';
import mainActions from '../projects/actions';
import mainMutations from '../projects/mutations';
// Table module
import projectsModule from '../modules/projects/module';
// More module
import moreModule from '../modules/more/module';

Vue.use(Vuex);

export default new Vuex.Store({
    state: mainState,
    getters: mainGetters,
    actions: mainActions,
    mutations: mainMutations,
    modules: {
        projectsModule: projectsModule,
        moreModule: moreModule
    }
});
