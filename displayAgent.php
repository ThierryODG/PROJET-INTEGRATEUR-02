<?php
include 'connecte.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Resultat</title>

<body>
    <?php
    //include("entete.php");
    ?>
    <div class="containerD">
        <button class="btn btn-primary my-5"><a href="inscriptionAgent.php" class="text-light">Ajouter un personnel</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">CNIB</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from agent_reception";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nom = $row['nom'];
                        $prenom = $row['prenom'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $genre = $row['genre'];
                        $telephone = $row['telephone'];
                        $cnib = $row['cnib'];
                        echo '<tr>
            <th scope="row">' . $id . '</th>
             <td>' . $nom . '</td>
            <td>' . $prenom . '</td>
            <td>' . $email . '</td>
            <td>' . $password . '</td>
            <td> ' . $genre . '</td>
            <td>' . $telephone . ' </td>
            <td> ' . $cnib . '</td>
            
            <td>
            <button class="btn btn-primary"><a href="modifierAgent.php?modifieid=' . $id . '" class="text-light">Modifier</a></button>
            <button class="btn btn-danger"><a href="supprimerAgent.php?supprimeid=' . $id . '" class="text-light">Supprimer</a></button>
            </td>
        </tr>';
                    }
                }

                ?>


            </tbody>
        </table>
    </div>



</body>

</html>