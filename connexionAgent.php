<?php
    if (isset($_POST['submite'])) {

        if (isset($_POST['email']) &&  isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $erreur = "";
            include 'connecte.php';
            $req = mysqli_query($con, "SELECT * FROM agent_reception WHERE email = '$email' AND password = '$password' ");
            $num_ligne = mysqli_num_rows($req);
            if ($num_ligne > 0) {
                header("location:accueilAgent.php");
            } else {
                $erreur = "Email ou Mots de passe incorrectes.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1 class="titleconnect">connectez-vous</h1>
    <div class="form">
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
        <form action=" " method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Mot de passe:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" name="submite" value="Se connecter">
        </form>
    </div>



    <style>
        .form h1 {
            margin-top: 13px;
        }

        p {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: large;
            padding-bottom: 5%;
            padding-top: 1%;
        }

        .form {
            width: 300px;
            margin: auto;
            padding: 30px;

        }

        .form label {
            display: block;

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

        .form+P a {

            font-size: large;
            font-weight: bold;
        }
    </style>


</body>

</html>

<?php
include("pied_de_page.php");
?>