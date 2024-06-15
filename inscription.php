
<?php
include 'connecte.php';
if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $genre=$_POST['genre'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cnib=$_POST['cnib'];

    $sql="insert into client (nom,prenom,genre,telephone,email,password,cnib) 
    values('$nom','$prenom','$genre','$telephone','$email','$password','$cnib')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo " Donnees inserees avec succes";
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
    <h1>inscrivez-vous</h1>
    <div class="form">
        <form  method="post">
            <label for="lname">Nom:</label><br>
            <input type="text" id="Nom" name="nom"><br>
            <label for="prenom">Prénom:</label><br>
            <input type="text" id="Prénom" name="prenom"><br>
            <label for="genre">Genre:</label><br>
            <input type="text" id="Genre" name="genre"><br>
            <label for="telephone">Telephone:</label><br>
            <input type="text" id="telephone" name="telephone"><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="password">Mot de passe:</label><br>
            <input type="text" id="password" name="password"><br>
            <label for="cnib">CNIB:</label><br>
            <input type="text" id="cnib" name="cnib"><br>
            <input type="submit" name="submit" value="S'inscrire">
        </form>
    </div>

    <p> <a href="connexion.php">connectez-vous ici</a>.



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
        </style>

<?php
include("pied_de_page.php");
?>
</body>

</html>

