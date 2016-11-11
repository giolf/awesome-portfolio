<?php

add_action( 'wp_enqueue_scripts', 'styles_and_scripts' );
function styles_and_scripts() {

    if (get_post_type(get_the_ID()) == 'project' && is_single()) {
        wp_enqueue_style(
            'awesome-portoflio-project',
            plugins_url('../dist/css/project.css', __FILE__ )
        );
        wp_enqueue_script(
            'awesome-portfolio-project',
            plugins_url('../dist/js/project.bundle.js', __FILE__)
        );
    }

}

?>
