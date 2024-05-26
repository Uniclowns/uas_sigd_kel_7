<html>

<head>
    <title>UAS SIGD KELOMPOK 7</title>
    <meta name="viewport" content="width=device-width, initialscale=1">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- leaflet.js file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        #map {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- leaflet.js file-->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script>
        var map =
            L.map('map').setView([-
                0.05937571139236873,
                109.34702174062821
            ], 16);
        mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + 'Contributors',
            maxZoom: 18
        }).addTo(map);
        let marker = null;
        map.on('click', function(e) {
            let latitude = e.latlng.lat.toFixed(15);
            let longitude = e.latlng.lng.toFixed(15);
            if (marker !== null) {
                map.removeLayer(marker);
            }
            document.querySelector("#latitude").value = latitude;
            document.querySelector("#longitude").value = longitude;
            var popup = L.popup()
                .setLatLng([latitude, longitude])
                .setContent("Koordinat : " + latitude + " , " + longitude)
                .openOn(map);
            marker = L.marker([latitude, longitude]).addTo(map);
        });

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            position: 'topright',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'brown'
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000
                    },
                    showArea: true,
                    metric: false,
                    repeatMode: true
                },
                polyline: {
                    shapeOptions: {
                        color: 'red'
                    },
                },
                rect: {
                    shapeOptions: {
                        color: 'green'
                    },
                },
                circle: {
                    shapeOptions: {
                        color: 'steelblue'
                    },
                },
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);
        18
        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;
            drawnItems.addLayer(layer);
        });


        // Menambahkan layer peta jalan
        var streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 19
        });

        // Menambahkan layer peta jalan
        var streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 19
        });

        // Menambahkan layer peta satelit
        var satellite = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; <a href="https://www.esri.com/">Esri</a> ',
                maxZoom: 17
            });

        // Menambahkan layer peta topografi
        var topo = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://opentopomap.org/">OpenTopoMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>',
            maxZoom: 17
        });
        // Menambahkan control layer pada peta
        streets.addTo(map);

        @foreach ($peta as $p)
            // Menambahkan point pada peta dan pop up
            var point = L.marker([{{ $p->latitude }}, {{ $p->longitude }}]).addTo(map);
            point.bindPopup("<b>{{ $p->name }}</b><br>{{ $p->asal }}" +
                "<br><a href='{{ route('edit', $p->id) }}' class='button'>Edit</a>");

            // Menambahkan line pada peta dan pop up
            var linePoints = [
                [{{ $p->latitude }}, {{ $p->longitude }}],
                [-0.0606514, 109.3423133],
                [-0.0534684, 109.3445893]

            ];
            var line = L.polyline(linePoints, {
                color: 'red'
            }).addTo(map);
            line.bindPopup("<b>Lokasi Line</b><br>Ini adalah lokasi line.");

            // Menambahkan polygon pada peta dan pop up
            var polygonPoints = [
                [-0.046743386973349, 109.334604377554797],
                [-0.053470365424973, 109.344570751551416]
            ];
        @endforeach
        var polygon = L.polygon(polygonPoints, {
            color: 'blue'
        }).addTo(map);
        polygon.bindPopup("<b>Lokasi Polygon</b><br>Ini adalah lokasi polygon.");

        // Mengelompokkan layer peta ke dalam objek layer        
        var baseLayers = {
            "Streets": streets,
            "Satellite": satellite,
            "Topography": topo,
        };


        // Menambahkan control layer pada peta        

        L.control.layers(baseLayers).addTo(map);
    </script>
</body>

</html>
