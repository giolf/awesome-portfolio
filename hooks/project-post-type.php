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
            'search_item'           => 'Cerca progetti',
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

?>
