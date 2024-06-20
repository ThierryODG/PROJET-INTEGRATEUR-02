<?php
include 'connecte.php';
$id=$_GET['modifieid'];
$sql="select * from hotel where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$nom=$row['nom'];
$adresse=$row['adresse'];
$categorie=$row['categorie'];
$emplacement=$row['emplacement'];
$photo=$row['photo'];
$description=$row['description'];
$email=$row['email'];
$site=$row['site'];


if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $adresse=$_POST['adresse'];
    $categorie=$_POST['categorie'];
    $emplacement=$_POST['emplacement'];
    $photo=$_POST['photo'];
    $description=$_POST['description'];
    $email=$_POST['email'];
    $site=$_POST['site'];

    
    $sql="update hotel set id=$id,nom='$nom',adresse='$adresse',categorie='$categorie',
    emplacement='$emplacement',photo='$photo',description='$description',email='$email',site='$site' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo " Modification reussie avec succes";
        header('location:accueilAdmin.php');
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
    <h1>Ajouter un hotel</h1>
    <div class="form">
        <form method="post">
            <label for="lname">Nom:</label><br>
            <input type="text" id="nom" name="nom"><br>
            <label for="adresse">Adresse:</label><br>
            <input type="text" id="adresse" name="adresse"><br>
            <label for="categorie">Categorie:</label><br>
            <input type="text" id="categorie" name="categorie"><br>
            <label for="emplacement">Emplacement:</label><br>
            <input type="text" id="emplacement" name="emplacement"><br>
            <label for="photo">Photo:</label><br>
            <input type="blob" id="photo" name="photo"><br>
            <label for="description">Description:</label><br>
            <input type="text" id="description" name="description"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="site">Site:</label><br>
            <input type="text" id="site" name="site"><br>
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