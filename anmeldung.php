<!doctype html>
<html lang="en">

<head>
    <style>
        .input {
            margin-left: 830px;
            margin-top: 250px;
        }

        .back {
            margin-left: -10px;
            margin-top: 41px;
            background-color: red;
            width: 177px;
        }
    </style>
</head>

<body>

    <button class="back" onclick="location.href='index.php'">back to main page</button>

    <form action="anmeldungdata.php" method="POST">
        <div class="input">
            <!-- <label for ="username">Username </label> 
            <input type="username" id="username" name="username" placeholder="username"> <br> <br> -->
            <input type="username" name="username" placeholder="username"> <br> <br>
            <!--<label for="password">Password</label> 
            <input type="password" id="password" name="password" placeholder="password"> <br> <br> -->
            <input type="password" name="password" placeholder="password"> <br> <br>
            <button type="submit" name="submit">
                register
            </button>
        </div>
    </form>

</body>

</html>