<?php
add_action( 'wp_ajax_nopriv_get_projects', 'ajax_get_projects' );
add_action( 'wp_ajax_get_projects', 'ajax_get_projects' );
function ajax_get_projects() {

    $query = new WP_Query([
        'post_type' => 'project',
        'post_status' => 'publish'
    ]);

    while ( $query->have_posts() ) :

        $prj = $query->next_post();

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
        $prj->f_file = wp_get_attachment_image_src(
            get_post_meta(
                $prj->ID,
                'featured_file_project',
                true
            ),
            'medium' // !!! still need to create the right thumb size !!!
        )[0];

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
