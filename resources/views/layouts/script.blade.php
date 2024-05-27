<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-0.05937571139236873, 109.34702174062821], 16);
    var mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

    var streets = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; ' + mapLink + ' Contributors',
        maxZoom: 18
    }).addTo(map);

    var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; <a href="https://www.esri.com/">Esri</a>',
        maxZoom: 17
    });

    var topo = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://opentopomap.org/">OpenTopoMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>',
        maxZoom: 17
    });

    var baseLayers = {
        "Streets": streets,
        "Satellite": satellite,
        "Topography": topo
    };

    L.control.layers(baseLayers).addTo(map);

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

    @foreach ($places as $p)
        var point = L.marker([{{ $p->latitude }}, {{ $p->longitude }}]).addTo(map);
        point.bindPopup("<b>{{ $p->name }}</b>" +
            "<br><a href='{{ route('maps.show', $p->id) }}' class='button'>Details</a>");

        var polygonPoints = [
            [-0.046743386973349, 109.334604377554797],
            [-0.053470365424973, 109.344570751551416]
        ];

        var polygon = L.polygon(polygonPoints, {
            color: 'blue'
        }).addTo(map);
        polygon.bindPopup("<b>Lokasi Polygon</b><br>Ini adalah lokasi polygon.");
    @endforeach
</script>