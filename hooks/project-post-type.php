<?php

/**
 * Register the custom post type: 'project'
 */
add_filter('piklist_post_types', 'project_custom_type');
function project_custom_type($post_type)
{
    $post_type['project'] = array(
        'labels'    => array(
            'name'                  => 'Progetti',
            'singular_name'         => 'Progetto',
            'add_new'               => 'Nuovo progetto',
            'add_new_item'          => 'Nuovo progetto',
            'edit_item'             => 'Modifica progetto',
            'new_item'              => 'Nuovo progetto',
            'view_item'             => 'Visualizzaa progetto',
            'search_items'          => 'Cerca progetti',
            'not_found'             => 'Progetto non trovato',
            'not_found_in_trash'    => 'Nessun progetto trovato nel cestino',
            'all_items'             => 'Tutti i progetti',
            'insert_into_item'      => 'Inserisci nel progetto',
            'upload_to_this_item'   => 'Carica nel progetto',
            'featured_image'        => 'Copertina del progetto',
            'set_featured_image'    => 'Imposta immagine di copertina',
            'remove_featured_image' => 'Rimuovi immagine di copertina',
            'use_featured_image'    => 'Utilizza come immagine di copertina'
        ),
        'title'     => 'Inserisci un nuovo progetto',
        'menu_icon' => piklist('url', 'piklist') . '/parts/img/piklist-menu-icon.svg',
        'page_icon' => piklist('url', 'piklist') . '/parts/img/piklist-page-icon-32.png',
        'supports'  => ['title', 'editor', 'post-formats'],
        'public'    => true,
        'rewrite'   => array(
            'slug'  => 'progetto'
        )
    );

    return $post_type;
}

/**
 * Register the columns in the projects list
 */
add_filter( 'manage_edit-project_columns', 'project_columns' );
function project_columns( $columns ) {
    $lan_column = $columns['language'];

    unset($columns['language']);
    unset($columns['date']);

    $columns['place_project'] = 'Luogo';
    $columns['date_project'] = 'Data di realizzazione';
    $columns['language'] = 'Lingue';

    return $columns;
}

/**
 * Display the columns content
 */
add_action( 'manage_project_posts_custom_column' , 'project_columns_display', 10, 2 );
function project_columns_display( $column_name, $post_id ) {
    switch ($column_name) {
        case 'date_project':
            $date_project = get_post_meta($post_id, 'date_project', true);
            if(!$date_project)
                echo '<em>' . 'Data non inserita' . '</em>';
            else
                echo (new DateTime($date_project))->format('d-m-Y');
            break;

        case 'place_project':
            $place_project = get_post_meta($post_id, 'place_project', true);
            if(!$place_project)
                echo '<em>' . 'Luogo non inserito' . '</em>';
            else
            echo $place_project;
            break;
        default:
            break;
    }
}

/**
 * Register the columns as sortable
 */
add_filter( 'manage_edit-project_sortable_columns', 'project_columns_sortable' );
function project_columns_sortable( $columns ) {
    $columns['place_project'] = 'Luogo';
    $columns['date_project']  = 'Data di realizzazione';
    return $columns;
}

/**
 * Custom orderBy for the project's columns
 */
add_action( 'pre_get_posts', 'project_columns_orderby' );
function project_columns_orderby( $query ) {
    if( ! is_admin() )
        return;

    $orderby = $query->get('orderby');

    if( $orderby == 'Luogo' ) {
        $query->set('meta_key','place_project');
        $query->set('orderby','meta_value');
    }
    else if ($orderby == 'Data di realizzazione') {
        $query->set('meta_key','date_project');
        $query->set('orderby','meta_value');
    }
    else
        return;
}
?>
