<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Picker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        body {

            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h3 {
            color: #17a2b8;
            margin-bottom: 20px;
        }

        #map {
            width: 100%;
            height: 400px;
            /* Adjust height as needed */
            margin-bottom: 20px;
        }

        .btn {
            background-color: #17a2b8;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0b6e87;
        }
    </style>
</head>

<body>
    <?php include('../header.php'); ?>

    <div class="container">
        <h3>Add your location by double-clicking on the map</h3>

        <div id="map"></div>

        <form id="myForm" method="post" action="process.php">
            <input type="hidden" id="latitude" name="lat">
            <input type="hidden" id="longitude" name="lon">
        </form>

        <button class="btn" id="confirmBtn">Confirm Location</button>
        <button class="btn" onclick="redirectToMap()">Cancel</button>
    </div>

    <?php include('../footer.php'); ?>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([6.822619, 80.041627], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker;

        map.on('dblclick', function (event) {
            var clickedLocation = event.latlng;
            if (marker) {
                marker.setLatLng(clickedLocation);
            } else {
                marker = new L.marker(clickedLocation).addTo(map);
            }
            document.getElementById("latitude").value = clickedLocation.lat;
            document.getElementById("longitude").value = clickedLocation.lng;
        });

        document.getElementById("confirmBtn").addEventListener("click", function () {
            if (confirm("Do you want to add this location?")) {
                document.getElementById("myForm").submit();
            }
        });

        function redirectToMap() {
            window.location.href = "map.php";
        }
    </script>
</body>

</html>
