// UIkit Common dependencies
require('../uikit-common.js');
require('../../../node_modules/bower_components/uikit/js/core/scrollspy.js');

// VueJS
import Vue from 'vue';
import VueResource from 'vue-resource';
// Store
import store from '../store/projects/store';
// Getters
import { mapGetters } from 'vuex';
// Components
import Projects from '../components/projects/projects.vue';
import More from '../components/more/more.vue';

Vue.use(VueResource);

window.onload = () => {
    new Vue({
        el: '#app-projects',
        store,
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
