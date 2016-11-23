import Vue from 'vue';

class API {
    projects() {
        return Vue.http.get(
            '/wp-admin/admin-ajax.php',
            { params: {
                action: 'get_projects'
            }}
        );
    }
}

export default new API();
