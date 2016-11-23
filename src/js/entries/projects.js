// UIkit Common dependencies
require('../uikit-common.js');
// VueJS
import Vue from 'vue';
import VueResource from 'vue-resource';
// Store
import store from '../store/projects/store';
// Components
import ProjectsTable from '../components/projects/projectsTable.vue';

Vue.use(VueResource);

window.onload = () => {
    new Vue({
        el: '#app-projects',
        store,
        components: {
            'projects-table': ProjectsTable
        }
    });
};
