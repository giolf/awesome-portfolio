import Vue from 'vue';
import API from '../../../API/API';

export default {
    getProjects({ dispatch, commit }, paginator) {
        return new Promise((resolve, reject) => {
            API.projects(paginator.page).then(
                (response) => {
                    commit('setProjectsList', response.data);
                    resolve();
                },
                (errors) => {
                    reject(errors);
                }
            );
        });
    }
};
