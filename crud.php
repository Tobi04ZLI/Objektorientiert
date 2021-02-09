<!doctype html>
<html lang="en">

<head>
</head>

<body>

<button class="back" onclick="location.href='index.php'">back to main page</button>

<form action="crud.php" method="POST">
    <div class="first">
        <input type="" name="" placeholder=""> <br> <br>
        <input type="" name="" placeholder=""> <br> <br>
        <button type="" name="">
        </button>
    </div>
</form>

<form action="crud.php" method="POST">
    <div class="second">
        <input type="" name="" placeholder=""> <br> <br>
        <input type="" name="" placeholder=""> <br> <br>
        <button type="" name="">
        </button>
    </div>
</form>

<?php
$entity = array();
require_once 'database.class.php' ;
require_once 'crudoop.php';
$dbms = new Database("localhost", "root", "", "happyplacetwo");
$entity = new Entity($dbms->getConnection(), "places");

print_r($entity->columns);

?>
</body>

</html>