<?php
/*
Title: Informazioni progetto
Post type: project
*/

piklist('field', array(
    'type' => 'group',
    'colums' => 12,
    'list'  => false,
    'template'	=> 'field',
    'fields' => array(
        array(
            'type' => 'datepicker',
            'field' => 'date_project',
            'label' => 'Data',
            'options' => array(
                'dateFormat' => 'yy-mm-dd'
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
                'placeholder' => 'Luogo del progetto'
            )
        ),
        array(
            'type' => 'html',
            'columns' => 12,
            'attributes' => array(
                'class' => 'map_project',
                'style' => 'height: 250px; padding-top: 0; margin-top: 1%;'
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
    function initMap() {
        var map = new google.maps.Map(document.getElementsByClassName('map_project')[0], {
          center: {lat: 46.0074, lng: 8.9594},
          zoom: 13
        });
        var input = document.getElementById('_post_meta_place_project_0');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);

            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Il luogo: '" + place.name + "' " + "non è valido");
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            }
            else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
        });

        if (input.value.length != 0) {
            var geocoder = new google.maps.Geocoder();
            var address = input.value;

            geocoder.geocode({'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK && status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                    if (address.split(",").length == 2) {
                        map.fitBounds(results[0].geometry.viewport);
                    }
                    else {
                        map.setCenter(results[0].geometry.location);
                        map.setZoom(17);
                    }
                }
                else {
                    window.alert("Luogo del progetto non trovato");
                    return;
                }

                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: "https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png",
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(results[0].geometry.location);
                marker.setVisible(true);
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyYF-LZWdVU2asSa_rLe8i1XLvea3sHjQ&libraries=places&callback=initMap" async defer></script>
