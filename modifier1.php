<?php
include 'connecte.php';
$id=$_GET['modifieid'];
$sql="select * from client where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$nom=$row['nom'];
$prenom=$row['prenom'];
$genre=$row['genre'];
$telephone=$row['telephone'];
$email=$row['email'];
$password=$row['password'];
$cnib=$row['cnib'];


if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $genre=$_POST['genre'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cnib=$_POST['cnib'];

    
    $sql="update client set id=$id,nom='$nom',prenom='$prenom',genre='$genre',
    telephone='$telephone',email='$email',password='$password',cnib='$cnib'where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo " Modification reussie avec succes";
        header('location:displayc.php');
    }else{
        die(mysqli_error($con));
    }

}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include("entete.php");
    ?>

    <br>
    <br>
    <h1>Modifier</h1>
    <div class="form">
        <form method="post">
            <label for="lname">Nom:</label><br>
            <input type="text" id="Nom" name="nom" value=<?php echo $nom;?>><br>
            <label for="prenom">Prénom:</label><br>
            <input type="text" id="Prénom" name="prenom" value=<?php echo $prenom;?>><br>
            <label for="Genre">Genre:</label><br>
            <select name="genre" id="Genre" required value=<?php echo $genre;?>>
                <option value="">Sélectionnez votre genre...</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select><br>
            <label for="telephone">Telephone:</label><br>
            <input type="text" id="telephone" name="telephone" value=<?php echo $telephone;?>><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value=<?php echo $email;?>><br>
            <label for="password">Mot de passe:</label><br>
            <input type="text" id="password" name="password" value=<?php echo $password;?>><br>
            <label for="cnib">CNIB:</label><br>
            <input type="text" id="cnib" name="cnib" value=<?php echo $cnib;?>><br>
            <input type="submit" name="submit" value="Modifier">
        </form>
    </div>




        <style>
            p {
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                font-size: large;
                padding-bottom: 3%;
                padding: 1%;
            }

            .form {
                width: 300px;
                margin: 0 auto;
                padding-top: 1%;
            }

            .form label {
                display: block;
                margin-top: 20px;
            }

            .form input[type="text"],
            .form input[type="email"],
            .form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
            }

            .form input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: blue;
                color: white;
                border: none;
                margin-top: 20px;
                cursor: pointer;
            }

            .form input[type="submit"]:hover {
                background-color: darkblue;
            }

            .form select {
                width: 100%;
                height: 45px;
            }

            .form+P a {

                font-size: large;
                font-weight: bold;
            }
        </style>

        <?php
        include("pied_de_page.php");
        ?>
</body>

</html>