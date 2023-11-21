<!DOCTYPE html>
<html lang="en">

<head>
    <title>Leaflet Map Jumlah Penduduk Kinasih</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet JS</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">

    <!-- Getboostrap toast pop up-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Search CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />

    <!-- Geolocation CSS Library for Plugin -->
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />

    <!-- Leaflet Mouse Position CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />

    <!-- Leaflet Measure CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />

    <!-- EasyPrint CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />
    
    <!-- Marker Cluster -->
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.css">
    <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.Default.css">

    <!--Routing-->
    <link rel="stylesheet" href="assets/plugins/leaflet-routing/leaflet-routing-machine.css" />
    
    <style>
    html, body, #map {
        height: 100%;
        width: 100%;
        margin: 0px;
    }

    /* Background pada Judul */
    *.info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
    text-align: center;
    }
    .info h2 {
    margin: 0 0 5px;
    color: #777;
    }

    </style>
</head>

<body>
    <div id="map" style="height: 100vh;"></div>
<!-- Include your GeoJSON data -->
<script src="./data.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Getboostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Search JavaScript Library -->
    <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>

    <!-- Geolocation Javascript Library -->
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>

    <!-- Leaflet Mouse Position JavaScript Library -->
    <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>

    <!-- Leaflet Measure JavaScript Library -->
    <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>

    <!-- EasyPrint JavaScript Library -->
    <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

    <!-- Marker Cluster -->
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster-src.js"></script>

    <!--Routing-->
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.min.js"></script>


    <script>
        /* Initial Map */
        var map = L.map('map').setView([-7.794760241050732, 110.36718249219427], 10); //lat, long, zoom
        /* Tile Basemap */
        var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIG UGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
        });
        var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{ z } / { y } / { x }',
            {
                attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
            });
        var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{ z } / { y } / { x }',
            {
                attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
            });
        var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptile s.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });
        basemap1.addTo(map);

        /* Judul dan Subjudul */
    var title = new L.Control();
    title.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
    };
    title.update = function () {
    this._div.innerHTML = '<h2>LATIHAN WEBGIS | JUMLAH PENDUDUK KABUPATEN SLEMAN</h2>MATA KULIAH PEMROGRAMAN SPASIAL : WEB'
    };
    title.addTo(map);

        /* Control Layer */
        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4
        };
        var overlayMaps = {
            
        };
        L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(map);

        /* Scale Bar */
        L.control.scale({
            maxWidth: 150, position: 'bottomright'
        }).addTo(map); 

    // Create a GeoJSON layer for polygon data
        var wfsgeoserver1 = L.geoJson(null, {
            style: function (feature) {
                // Adjust this function to define styles based on your polygon properties
                var value = feature.properties.jumlah; // Change this to your actual property name
                return {
                    fillColor: getColor(value),
                    weight: 2,
                    opacity: 1,
                    color: "white",
                    dashArray: "3",
                    fillOpacity: 0.7,
                };
            },
            onEachFeature: function (feature, layer) {
                var content = "Kecamatan : " + feature.properties.kecamatan + "<br>" +
                    "Jumlah Penduduk : " + feature.properties.jumlah + "<br>" 
                    layer.bindPopup(content);

                layer.on({
                    click: function (e) {
                        wfsgeoserver1.bindPopup(content);
                    },
                    mouseover: function (e) {
                        wfsgeoserver1.bindTooltip(feature.properties.kecamatan);
                    },
                    mouseout: function (e) {
                        wfsgeoserver1.closePopup();
                    }
                });
            }
        });

//         var picURL2 = '/Downloads/yogyakarta.png';

//         shelter1.bindPopup("<img src='" + picURL2 + "'" + "class=popupImage" + "/>");
        
// .popupImage {
//     max-width: 20%;
//     max-height: 20%;
// }

        // Fetch GeoJSON data from geoserver.php
        $.getJSON("wfsgeoserver1.php", function (data) {
            wfsgeoserver1.addData(data);
            map.addLayer(wfsgeoserver1);
            // map.fitBounds(wfsgeoserver1.getBounds());
        });
        
    /* Image Watermark */
    L.Control.Watermark = L.Control.extend({
    onAdd: function(map) {
    var img = L.DomUtil.create('img');
    img.src = 'assets/img/logo/LOGO_SIG_BLUE.png';
    img.style.width = '200px';
    return img;
    }
    });

    L.control.watermark = function(opts) {
    return new L.Control.Watermark(opts);
    }
    L.control.watermark({ position: 'bottomright' }).addTo(map);


    /* Image Legend */
    L.Control.Legend = L.Control.extend({
    onAdd: function(map) {
    var img = L.DomUtil.create('img');
    img.src = 'assets/img/legend/legenda.png';
    img.style.width = '400px';
    return img;
    }
    });

    L.control.Legend = function(opts) {
    return new L.Control.Legend(opts);
    }

    L.control.Legend({ position: 'bottomleft' }).addTo(map);


    /*Plugin Search */
    var searchControl = new L.Control.Search({
        position: "topleft",
        layer: wfsgeoserver1, //Nama variabel layer
        propertyName: "Kecamatan", //Field untuk pencarian
        marker: false,
        moveToLocation: function (latlng, title, map) {
            var zoom = map.getBoundsZoom(latlng.layer.getBounds());
            map.setView(latlng, zoom);
        },
        });
        searchControl
        .on("search:locationfound", function (e) {
        e.layer.setStyle({
            fillColor: "#ffff00",
            color: "#0000ff",
        });
        })
        .on("search:collapse", function (e) {
        featuresLayer.eachLayer(function (layer) {
        featuresLayer.resetStyle(layer);
        });
        });
        map.addControl(searchControl);

         /*Plugin Geolocation */
        var locateControl = L.control.locate({
        position: "topleft",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: false,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8,
        },
        circleStyle: {
            weight: 1,
            clickable: false,
        },
        icon: "fa-solid fa-crosshairs",
        metric: true,
        strings: {
            title: "Click for Your Location",
            popup: "You're here. Accuracy {distance} {unit}",
            outsideMapBoundsMsg: "Not available",
        },
        locateOptions: {
            maxZoom: 16,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000,
        },
        })
        .addTo(map);

        /*Plugin Mouse Position Coordinate */
        L.control.mousePosition({ position: "bottomright", separator: ",", prefix: "Point Coodinate: " }).addTo(map);



        /*Plugin Measurement Tool */
        var measureControl = new L.Control.Measure({
        position: "topleft",
        primaryLengthUnit: "meters",
        secondaryLengthUnit: "kilometers",
        primaryAreaUnit: "hectares",
        secondaryAreaUnit: "sqmeters",
        activeColor: "#FF0000",
        completedColor: "#00FF00",
        });
        measureControl.addTo(map);

        /*Plugin EasyPrint */
        L.easyPrint({
        title: "Print",
            }).addTo(map);

        /*Plugin Routing */
        L.Routing.control({
            waypoints: [
                L.latLng(-7.774876989477508, 110.3746770621709),
                L.latLng(-7.789865101510259, 110.37792578946565)
            ],
            routeWhileDragging: true
        }).addTo(map);

        /*Layer Marker */
        // var addressPoints = [
        //     [-7.788956040931793, 110.43067496364252, "Bandara Adi Sutjipto"],
        //     [-7.768171848454939, 110.37345811842205, "Halte Sardjito"],
        //     [-7.790133255485602, 110.37543503863745, "Stasiun Lempuyangan"],
        //     [-7.789294547910656, 110.48315058, "Stasiun Tugu"],
        //     [-7.756496055916556, 110.39588578650753, "Terminal Bus Condong Catur"],
        //     [-7.746830619416115, 110.3614586386372, "Terminal Jombor"],
        //     [-7.7629405515942445, 110.33655991165242, "Halte Nogotirto"],
        //     [-7.777247622201332, 110.37582735398233, "Halte SMPN 1 Yogyakarta"],
        //     [-7.790611766291355, 110.36621626932431, "Halte Malioboro"],
        //     [-7.7874202151732534, 110.36662295398091, "Halte Mangkubumi"],
        //     ];

        // var markers = L.markerClusterGroup();

        // for (var i = 0; i < addressPoints.length; i++) {
        //     var a = addressPoints[i];
        //     var title1= a[2];
        //     var marker = L.marker(new L.LatLng(a[0], a[1]), { 
        //     title: title1
        // });
        
        // marker.bindPopup(title1);
        // markers.addLayer(marker);


        // }

        var addresPoints = [
            [-7.789294547910656, 110.48315058 ]
        ]
        var markers = L.markerClusterGroup();
        for (var i = 0; i < addresPoints.length; i++) {
            var a = addresPoints[i];
            var title1 = a[2];
            var marker = L.marker(new L.latLng(a[0], a[1]), {
                title: title1
            })
            
            marker.bindPopup("<h2>Stasiun Tugu</h2><p> Salah satu stasiun di Yogyakarta yang terkenal dengan fasilitasnya yang oke</p> <img src='./img/yogyakarta.png'/>");
            marker.addTo(map);
            marker.openPopup()
        }
        map.addLayer(markers); 

        var addresPoints = [
            [-7.788956040931793, 110.43067496364252 ]
        ]
        var markers = L.markerClusterGroup();
        for (var i = 0; i < addresPoints.length; i++) {
            var a = addresPoints[i];
            var title1 = a[2];
            var marker = L.marker(new L.latLng(a[0], a[1]), {
                title: title1
            })
            
            marker.bindPopup("<h2>Bandara Adi Sutjipto</h2><p> Salah satu stasiun di Yogyakarta yang terkenal dengan fasilitasnya yang oke</p> <img src='./img/yogyakarta.png'/>");
            marker.addTo(map);
            marker.openPopup()
        }
        map.addLayer(markers);

         // Function to determine the color based on the 'value' attribute
        function getColor(value) {
        return value > 75000
        ? "#4a1486"
        : value >= 50000 && value <= 75000
        ? "#807dba" 
        : value < 50000
        ? "#c6dbef" 
        : "#c6dbef";
    }

        
        /* Scale Bar */
        L.control.scale({
            maxWidth: 150, position: 'bottomright'
        }).addTo(map);


</script>
</body>

</html>