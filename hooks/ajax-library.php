<?php
add_action( 'wp_head', 'add_ajax_library' );
function add_ajax_library() {
    $html = '<script type="text/javascript">';
    $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
    $html .= '</script>';

    echo $html;
}
