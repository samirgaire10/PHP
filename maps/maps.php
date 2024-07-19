<!DOCTYPE html>
<html>
<head>
    <title>Full-Screen Map</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #map {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<nav id="desktop-nav">
        <div class="logo">
            <a href="https://samirgaire10.github.io/Portfolio/" target="_blank" rel="noopener noreferrer">ガイレ サミル</a>
        </div>
        <div>
            <ul class="nav-links">
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Github</a></li>
                <li><a href="user/userdata.php">
                <?php
                $username = 'Guest User';
                $filePath = './user/user_data.json';

                if (file_exists($filePath)) {
                    $jsonData = file_get_contents($filePath);
                    $data = json_decode($jsonData, true);
                    
                    if (isset($data['username'])) {
                        $username = $data['username'];
                    }
                }

                echo "<p>Welcome, $username!</p>";
            ?>


                </a></li>
                <!-- <li><a href="#projects">Projects</a></li> 
                <li><a href="./lg/jp.html">Japanese</a></li> -->
            </ul>
        </div>
    </nav>
<div id="map"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Initialize the map
        // var map = L.map('map').setView([36.2048, 138.2529], 5); // Centered on Japan
        var map = L.map('map').setView([20, -10], 2);



        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fetch and display earthquake data for Japan
        async function fetchEarthquakeData() {
            const url = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&limit=10&maxlatitude=45.0&minlatitude=24.0&maxlongitude=153.0&minlongitude=122.0';

            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Error fetching earthquake data');
                const data = await response.json();
                
                data.features.forEach(event => {
                    const coordinates = event.geometry.coordinates;
                    const magnitude = event.properties.mag;
                    const description = event.properties.title;

                    L.marker([coordinates[1], coordinates[0]])
                        .addTo(map)
                        .bindPopup(`<strong>Magnitude: ${magnitude}</strong><br>${description}`);
                });
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // Fetch and display flood data for Japan
        async function fetchFloodData() {
            const url = 'https://api.weather.gov/alerts'; // Example endpoint for weather alerts

            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Error fetching flood data');
                const data = await response.json();

                data.features.forEach(event => {
                    const coordinates = event.geometry.coordinates;
                    const description = event.properties.description;

                    if (coordinates && event.properties.areaDesc.includes("Japan")) {
                        L.marker([coordinates[1], coordinates[0]])
                            .addTo(map)
                            .bindPopup(`<strong>Flood Alert:</strong><br>${description}`);
                    }
                });
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // Call both functions to fetch data and display on the map
        fetchEarthquakeData();
        fetchFloodData();

        
    </script>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-links">
                <a href="../index.php">Home</a>
                <a href="https://github.com/samirgaire10/">Github</a>
                <a href="https://samirgaire10.github.io/Portfolio/">Portfolio</a>
            </div>
            <p>&copy; 2024 samirgaire10. All Rights Reserved.</p>
        </div>
    </footer>
</body>
<!-- <script src="script.js"></script> -->

</html>