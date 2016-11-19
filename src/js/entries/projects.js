// UIkit Common dependencies
require('../uikit-common.js');

// VueJS
import Vue from 'vue';
import VueResource from 'vue-resource';

// Components
import ProjectsTable from '../components/projects/projectsTable.vue';

Vue.use(VueResource);

window.onload = () => {
    new Vue({
        el: '#app-projects',
        components: {
            'projects-table': ProjectsTable
        },
        data: {
            projects: 'tesst'
        }
    });
};
