<!--header-->
<?php include('../header.php');
$msg = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with Bootstrap</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #mapWrap {
            height: 400px;
            max-width: 800px;
        }
    </style>
</head>

<body>
    <div class="container-fluid"><br>&nbsp;<br><br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="mapWrap" class="mt-3"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <!-- Include Bootstrap and Leaflet libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const map = L.map('mapWrap').setView([6.8213, 80.04176], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Fetch locations from PHP script
        fetch('fetch_locations.php')
            .then(response => response.json())
            .then(locations => {
                locations.forEach(location => {
                    const marker = L.marker([location[1], location[2]])
                        .bindPopup(location[0])
                        .addTo(map);

                    // Add click event listener to marker
                    marker.on('click', function () {
                        // Redirect user to makeOrder.php with accommodation_id parameter
                        window.location.href = 'makeOrder.php?accommodation_id=' + location[3];
                    });
                });
            })
            .catch(error => console.error('Error fetching locations:', error));
    </script>


</html>
<!--footer-->
<?php
include('../footer.php');
?>
