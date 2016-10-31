<?php
/*
title: Copertina del progetto
post type: project
context: side
priority: high
order: 1
lock: true
*/


piklist('field', array(
    'type' => 'file'
    ,'field' => 'featured_file_project'
    ,'description' => 'Seleziona un video o un\'immagine'
    ,'validate' => array(
        array(
            'type' => 'limit'
            ,'options' => array(
                'min' => 1
                ,'max' => 1
            )
            ,'message' => 'È possibile selezione una sola immagine o video per la copertina del progetto'
        )
    )
    ,'options' => array(
        'modal_title' => 'Scegli tra un video o un immagine'
        ,'button' => 'Aggiungi'
        ,'multiple' => false // must be boolean, not string
    )
));

?>
