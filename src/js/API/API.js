import Vue from 'vue';

class API {
    projects(page) {
        return Vue.http.get(
            '/wp-admin/admin-ajax.php',
            { params: {
                action: 'get_projects',
                page: page
            }}
        );
    }
}

export default new API();
