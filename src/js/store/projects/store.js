import Vue from 'vue';
import Vuex from 'vuex';
// Store
import mainState from '../projects/state';
// Table module
import tableModule from './modules/table/module';
Vue.use(Vuex);

export default new Vuex.Store({
    state: mainState,
    modules: {
        tableModule: tableModule,
    }
});
