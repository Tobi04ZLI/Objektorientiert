<?php
require_once "data.php";

?>

<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
  <style>
        /** {
            margin: 0;
            padding: 0;
        }*/

        .map {
            height: 90vh;
            width: 80%;
            position: absolute;
            left: 0;
        }

        form {
            position: absolute;
            padding: 1rem;
            top: 0;
            right: 0;
        }

        input {
            display: block;
        }

        label {
            display: block;
            margin-top: .5rem;
            font-size: .75rem;
        }

    table {
      border-collapse: collapse;
      margin-top: 20px;
    }

    button {
      width: 200px;
      background-color: #BEBEBE;
    }

    .name {
      border: white;
      background-color: #BEBEBE;
    }

    .register {
      margin-top: 20px;
      background-color: green;
      width: 177px;
    }

    .registertwo {
      margin-top: 20px;
      background-color: blue;
      width: 177px;
    }

    .back {
      margin-top: 20px;
      background-color: red;
      width: 177px;
    }

    .login {
      margin-top: 20px;
      background-color: yellow;
      width: 177px;
    }

  </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <title>Projekt Happyplace</title>
</head>

<body>

  <button class="register" onclick="location.href='registrierung.php'">register new member</button>
  <button class="back" onclick="location.href='index.php'">back to main page</button> <br>
  <!-- <button class="registertwo" onclick="location.href='login.php'">register new admin</button> -->
  <button class="login" onclick="location.href='anmeldung.php'">log in as admin</button>

  <div id="map" class="map"></div>
    <form method="POST" action="insert.php">
    <div class="name">
      <label for="name">Ortschaft</label>
      <input id="name" name="name">
    </div>
        <div class="latitude">
            <label for="latitude">Latitude</label>
            <input id="latitude" name="latitude" />
        </div>
        <div class="longitude">
            <label for="longitude">Longitude</label>
            <input id="longitude" name="longitude" />
        </div>

        <div class="prename">
            <label for="prename">Prename</label>
            <input id="prename" name="prename" />
        </div>
        <div class="lastname">
            <label for="lastname">Lastname</label>
            <input id="lastname" name="lastname" />
        </div>
        <button type="submit">Add Marker</button>
    </form>
  <script type="text/javascript">
        var markerPoints = [<?php
                            foreach ($markers as $marker) {
                                print $marker->toJson();
                                print ",\n\n";
                            }
                            ?>];

        var markers = [];

        for (let marker of markerPoints) {
            markers.push(new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat([marker.longitude, marker.latitude]))
            }));
        }

        var markers = new ol.layer.Vector({
            source: new ol.source.Vector({
                features: markers
            }),
            style: new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 46],
                    anchorXUnits: 'fraction',
                    anchorYUnits: 'pixels',
                    src: './marker.png'
                })
            })
        })

        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                markers
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([8.5208324, 47.360127]),
                zoom: 10
            })
        });
    </script>

  <?php 

  $conn->close();
  ?>

</body>

</html>