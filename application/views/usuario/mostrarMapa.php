<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url().'media/css/estiloUsuario.css'?>">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="icon" href="<?php echo base_url().'media/panic.jpg'?>">
    <title>Usuario: COVID-19</title>
</head>
<body>
    
    <div id="menu">
        <ul>
            <li><a href="<?php echo base_url().'index.php/usuario/index'?>">Casos</a></li>
            <li><a href="<?php echo base_url().'index.php/usuario/noticias'?>">Noticias</a></li>
            <li><a href="<?php echo base_url().'index.php/usuario/estadistica'?>">Estadisticas</a></li>
            <li class="right"><a href="<?php echo base_url().'index.php/login/'?>">Admin</a></li>
            <li class="right"><a href="https://t.me/SarsCovid19JR">Subcribete al canal</a></li>
        </ul>
    </div>

    <div id="mapa"></div>
    <script>  
     async function getData() {


var locs = [<?php foreach ($usuario as $mapa){?><?php echo "[{$mapa['lon']}, {$mapa['lat']}]," ?><?php }?>];

var nombre = [<?php foreach ($usuario as $mapa){?><?php echo "['{$mapa['nombre']} {$mapa['apellido']}']," ?><?php }?>];


var fecha_contagio = [<?php foreach ($usuario as $mapa){?><?php echo "['{$mapa['comentario']}']," ?><?php }?>];

var localidad = [<?php foreach ($usuario as $mapa){?><?php echo "['{$mapa['pais']}, {$mapa['ciudad']}']," ?><?php }?>];

var cedula = [<?php foreach ($usuario as $mapa){?><?php echo "['{$mapa['cedula']}']," ?><?php }?>];
mapboxgl.accessToken = 'pk.eyJ1IjoiamFtczI2MTIiLCJhIjoiY2s4bHY2NHM2MGcyeTNmbno0dTlld2Y5NSJ9.awNomWk_IAnF_YKOjKrZRg'



var map = new mapboxgl.Map({
    container: 'mapa',
    center: [-69.786324, 18.963442],
    style: 'mapbox://styles/mapbox/dark-v10',
    zoom: 6
});
map.addControl(new mapboxgl.NavigationControl());

for (x = 0; x < locs.length; x++) {

    var geojson = {
        type: 'FeatureCollection',
        features: [{
            type: 'Feature',

            geometry: {
                type: 'Point',
                coordinates: locs[x]
            }
        }]
    };
    cedulaa = cedula[x];
    URL = "http://173.249.49.169:88/api/test/consulta/" + cedulaa;
    const resp = await fetch(URL);
    const data = await resp.json();

    if (data.Ok) {

        geojson.features.forEach(function(marker) {

            var el = document.createElement('div');
            el.removeAttribute('style', "background-image:url('')");
            el.setAttribute('style', "background-image:url("+data.Foto+")");
            
            el.className = 'marker';



            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({
                        offset: 25
                    })

                    .setHTML('<div class="text-center"> <h3>' + nombre[x] + ' </h3> <br>' +
                        '<div class="card-body"><span class="member-degignation">Localidad: ' + localidad[x] + '</span><br>' +
                        '<span class="member-degignation">comentario: ' + fecha_contagio[x] + '</span>' +
                        '</div></div>'))
                .addTo(map);
        });


    } else {


        geojson.features.forEach(function(marker) {

            var el = document.createElement('div');
            el.removeAttribute('style', "background-image:url('')");
            el.setAttribute('style', "background-image:url('https://myspace.com/common/images/user.png')");
            el.className = 'marker';



            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .setPopup(new mapboxgl.Popup({
                        offset: 25
                    })

                    .setHTML('<div class="text-center"> <h5>' + nombre[x] + ' </h5> <br>' +
                        '<div class="card-body"><span class="member-degignation">Localidad: ' + localidad[x] + '</span><br>' +
                        '<span class="member-degignation">comentario: ' + fecha_contagio[x] + '</span>' +
                        '</div></div>'))
                .addTo(map);
        });
    }
}

     }
    getData();

    </script>

</body>
</html>