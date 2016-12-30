<?php
add_action( 'wp_ajax_nopriv_get_projects', 'ajax_get_projects' );
add_action( 'wp_ajax_get_projects', 'ajax_get_projects' );
function ajax_get_projects() {

    $query = new WP_Query([
        'post_type' => 'project',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'paged' => $_GET['page']
    ]);

    while ( $query->have_posts() ) :

        $prj = $query->next_post();

        $prj->link = get_permalink($prj->ID);

        $prj->post_title = trans(
            $prj->post_title
        );

        $prj->post_content = trans(
            $prj->post_content
        );

        $prj->place = get_post_meta(
            $prj->ID, 'place_project',
            true
        );

        $prj->date = get_post_meta(
            $prj->ID, 'date_project',
            true
        );

        $file_format = wp_get_attachment_metadata(
            get_post_meta(
                $prj->ID,
                'featured_file_project',
                true
            )
        )['mime_type'];

        // Check if the main project file is a movie or an image
        if ($file_format == 'video/quicktime') {
            $prj->f_img = wp_get_attachment_image_src(
                get_post_meta($prj->ID, 'images_project')[0],
                'featured_table_project'
            )[0];
        }
        else {
            $prj->f_img = wp_get_attachment_image_src(
                get_post_meta(
                    $prj->ID,
                    'featured_file_project',
                    true
                ),
                'featured_table_project'
            )[0];
        }


    endwhile;

    wp_send_json($query->posts);
    die();

}

function trans($content) {

    $lang = isset($_GET['lang']) ?
        $_GET['lang'] : it;

    $content = explode(
        '<!--:'.$lang.'-->',
        $content
    )[1];
    $content = explode(
        '<!--:-->',
        $content
    )[0];

    return $content;

}
