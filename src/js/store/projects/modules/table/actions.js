import Vue from 'vue';
import API from '../../../../API/API';

export default {
    getProjects({ commit }) {
        API.projects().then(
            (response) => {
                commit('setProjectsList', response.data);
            },
            (errors) => {
            console.log(errors);
            }
        );
    }
};
