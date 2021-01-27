<?php

class Marker
{
    public $lat;
    public $lng;
    public $name;
    public $prename;
    public $lastname;

    public function __construct($name, $lat, $lng, $prename, $lastname)
    {
        $this->latitude = $lat;
        $this->longitude = $lng;
        $this->name = $name;
        $this->prename = $prename;
        $this->lastname = $lastname;
    }

    public function toJson()
    {
        return json_encode([
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "name" => $this->name,
            "prename" => $this->prename,
            "lastname" => $this->lastname
        ]);
    }

    public function create($conn)
    {
        $lat = $conn->real_escape_string($this->latitude);
        $lng = $conn->real_escape_string($this->longitude);
        $name = $conn->real_escape_string($this->name);
        $prename = $conn->real_escape_string($this->prename);
        $lastname= $conn->real_escape_string($this->lastname);
        

        $sql = "INSERT INTO `places` (name, latitude, longitude) VALUES ('$name', '$lat', '$lng');";

        $result = $conn->query($sql);

        if (!$result) {
            die($conn->error);
        }

        $sql2 = "SELECT id FROM `places`";
        $result2 = $conn->query($sql2);
        $placesFromDatabase = $result2->fetch_all(MYSQLI_ASSOC);
        foreach ($placesFromDatabase as $place) {
            ($place);
            $placeid = $place['id'];
        }
        $sql2 = "INSERT INTO `apprentices` (prename, lastname, place_id) VALUES ('$prename', '$lastname', '$placeid');";
        
        
        $result2 = $conn->query($sql2);

        

        if (!$result2) {
            die($conn->error);
        }
    }

    public static function fetchAll($conn)
    {

        $sql = "SELECT * FROM `apprentices` JOIN places ON apprentices.place_id = places.id";
        $result = $conn->query($sql);

        if (!$result) {
            die($conn->error);
        }

        $markersFromDatabase = $result->fetch_all(MYSQLI_ASSOC);
        $markers = [];

        foreach ($markersFromDatabase as $marker) {
            $markers[] = new Marker($marker['name'], $marker['latitude'], $marker['longitude'], $marker['prename'], $marker['lastname']);
        }

        return $markers;
    }
}


/*class Mark {
    public $idthree;

    public function __construct($idthree = null)
    {
        $this->id = $idthree;
    }

    public function toJson()
    {
        return json_encode([
            "id" => $this->id
        ]);
    }

    public static function fetchAllthree($conn)
    {

        

        $sqlthree = "SELECT * FROM `markers`";
        $resultthree = $conn->query($sqlthree);

        if (!$resultthree) {
            die($conn->error);
        }

        $marksFromDatabase = $resultthree->fetch_all(MYSQLI_ASSOC);
        $marks = [];

        foreach ($marksFromDatabase as $mark) {
            $marks[] = new Mark($mark['id']);
        }

        return $marks;
    }
}*/

/*
class Apprentices {
    public $idtwo;
    public $prename;
    public $lastname;

    public function __construct($idtwo, $prename, $lastname = null)
    {
        $this->id = $idtwo;
        $this->prename = $prename;
        $this->lastname = $lastname;
    }

    public function toJson()
    {
        return json_encode([
            "id" => $this->id,
            "prename" => $this->prename,
            "lastname" => $this->lastname
        ]);
    }

    public function create($conn)
    {
        $prename = $conn->real_escape_string($this->prename);
        $lastname= $conn->real_escape_string($this->lastname);

        $placeid = "SELECT id FROM `places`";
        $markersid = "SELECT id FROM `markers`";

        $sqltwo = "INSERT INTO `apprentices` (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', '$placeid', '$markersid');";

        $resulttwo = $conn->query($sqltwo);

        if (!$resulttwo) {
            die($conn->error);
        }
    }

    public static function fetchAlltwo($conn)
    {
        $sqltwo = "SELECT * FROM `apprentices`";
        $resulttwo = $conn->query($sqltwo);

        if (!$resulttwo) {
            die($conn->error);
        }

        $apprenticesFromDatabase = $resulttwo->fetch_all(MYSQLI_ASSOC);
        $apprentices = [];

        foreach ($apprenticesFromDatabase as $apprentice) {
            $apprentices[] = new Apprentices($apprentice['id'], $apprentice['prename'], $apprentice['lastname']);
        }

        return $apprentices;
    }
}*/