// UIkit Common dependencies
require('../uikit-common.js');
require('../../../node_modules/bower_components/uikit/js/core/scrollspy.js');

// VueJS
import Vue from 'vue';
import VueResource from 'vue-resource';

// Vuex
import Vuex from 'vuex';

// Store
import store from '../store/store';

// Store - Modules
import projectsModule from '../store/modules/projects/module';
import moreModule from '../store/modules/more/module';

// Store - Getters
import { mapGetters } from 'vuex';

// Components
import Projects from '../components/projects/projects.vue';
import More from '../components/more/more.vue';

Vue.use(VueResource);
Vue.use(Vuex);

// Store init
store.modules = {
    projectsModule: projectsModule,
    moreModule: moreModule
};

window.onload = () => {
    new Vue({
        el: '#app-projects',
        store: new Vuex.Store(store),
        computed: {
            ...mapGetters([
                'isAppReady'
            ])
        },
        components: {
            'projects': Projects,
            'more': More
        }
    });
};
