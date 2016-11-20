<?php

add_action( 'init', 'featured_image_size' );
function featured_image_size() {

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'featured_prj_image', 900, 400, ['center', 'center'] );
        add_image_size( 'gallery_prj_image', 146, 87, ['center', 'center'] );
        add_image_size( 'featured_table_project', 444, 296, ['center, center'] );
    }
}

?>
