<?php

require_once("database.php");

class Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function login($conn)
    {

        $sqltwo = "SELECT username FROM users WHERE username = '$this->username' AND password = '$this->password';";
        $result = mysqli_query($conn, $sqltwo);

        if (mysqli_num_rows($result)) {
            $_SESSION["Admin"]=true;
            header("location: crud.php");
        } else {
            header("location: anmeldung.php");
            /*die(mysqli_error($conn) . "this user not exists");*/
        }

}
}

?>  