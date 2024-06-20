<?php
    include("./methode/db_methode.php");

    $mail=$_POST['email'];
    $pass=$_POST['password'];
    db_methode::loginResponsable($mail,$pass);
?>