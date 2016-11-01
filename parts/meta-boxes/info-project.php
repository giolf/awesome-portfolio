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
<script>
    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('_post_meta_info_projects_place_project_0')),
            {types: ['geocode']}
        );
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyYF-LZWdVU2asSa_rLe8i1XLvea3sHjQ&libraries=places&callback=initAutocomplete" async defer></script>
