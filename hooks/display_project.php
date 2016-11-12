<?php

add_filter('display_single_project', 'get_project_data');
function get_project_data() {

    global $post;

    // Get the common project's info
    $prj_data = array(
        'title' => $post->post_name,
        'place' => get_post_meta( $post->ID, 'place_project', true ),
        'date'  => (new DateTime(
            get_post_meta( $post->ID, 'date_project', true )
        ))->format('d-m-Y'),
        'gallery' => array()
    );

    // Check if the main project file is a movie or an image
    $file_format = wp_get_attachment_metadata(
        get_post_meta(
            $post->ID,
            'featured_file_project',
            true
        )
    )['mime_type'];

    if ($file_format == 'video/quicktime') {

        $prj_data['featured_prj_video'] = wp_get_attachment_url(
            get_post_meta(
                $post->ID,
                'featured_file_project',
                true
            )
        );

        $prj_data['main_file_type'] = 'video';

    }
    else {

        $prj_data['featured_prj_image'] = wp_get_attachment_image_src(
            get_post_meta( $post->ID, 'featured_file_project', true ),
            'featured_prj_image'
        )[0];

        $prj_data['main_file_type'] = 'img';

    }

    // project's gallery population
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
