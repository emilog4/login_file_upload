<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <?php  

$loginStatus = false;

$validateLogin = file("loginformation.txt");

function checkExistingLogin($validateLogin, $savedUsername, $savedPassword){
    foreach($validateLogin as $line){
        $userInfo = explode(";", $line);
        $username = trim($userInfo[0]);
        $password = trim($userInfo[1]);

        if($savedUsername == $username && $savedPassword == $password){
            echo "<h1>Welcome back ", $username, "</h1>";
            return $loginStatus = true;
        }
        else{
            echo "<h2>Incorrect password</h2>";
}
    }
}

$_SESSION["validateToken"] = false;

$loginStatus = checkExistingLogin($validateLogin, $_POST["username"], $_POST["password"]);

if($loginStatus == true ){

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["validateToken"] = true;
    echo'
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Välj en fil att ladda upp:
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <input type="submit" value="Ladda upp" name="submit" />
  </form>';
}


?>

<a href="login.html">Back to site</a>

</body>
</html>
