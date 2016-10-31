<?php
/*
Title: Informazioni progetto
Post type: project
*/

piklist('field', array(
    'type' => 'group',
    'field' => 'info_projects',
    'colums' => 12,
    'list'  => false,
    'template'	=> 'field',
    'fields' => array(
        array(
            'type' => 'datepicker',
            'field' => 'date_project',
            'label' => 'Data',
            'options' => array(
                'dateFormat' => 'dd-mm-yy'
            ),
            'columns' => 6,
            'attributes' => array(
                'placeholder' => 'Data del progetto'
            )
        ),
        array(
            'type' => 'text',
            'field' => 'place_project',
            'label' => 'Luogo',
            'columns' => 6,
            'attributes' => array(
                'placeholder' => 'Luogo del progetto',
                'style' => 'margin-bottom:25px'
            )
        ),
        array(
            'type' => 'file',
            'field' => 'images_project',
            'label' => 'Immagini',
            'description' => 'Inserisci le immagini del progetto',
            'options' => array(
                'modal_title' => 'Scegli le immagini del progetto',
                'button' => 'Aggiungi immagini',
            ),
            'columns' => 12,
        )
    )
));

?>
