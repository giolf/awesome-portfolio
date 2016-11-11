<?php

add_filter('display_single_project', 'get_project_data');
function get_project_data() {

    global $post;

    $prj_data = array(
        'title' => $post->post_name,
        'place' => get_post_meta( $post->ID, 'place_project', true ),
        'featured_prj_image' => wp_get_attachment_image_src(
            get_post_meta( $post->ID, 'featured_file_project', true ),
            'featured_prj_image'
        )[0],
        'date'  => (new DateTime(
            get_post_meta( $post->ID, 'date_project', true )
        ))->format('d-m-Y'),
        'gallery' => array()
    );

    foreach (get_post_meta( $post->ID, 'images_project' ) as $id) {

        $thumb = wp_get_attachment_image_src(
            $id, 'gallery_prj_image'
        )[0];

        $full = wp_get_attachment_image_src(
            $id, 'full'
        )[0];

        array_push($prj_data['gallery'], [
            'thumb' => $thumb,
            'full' => $full
        ]);

    }
    
    return $prj_data;
}

?>
