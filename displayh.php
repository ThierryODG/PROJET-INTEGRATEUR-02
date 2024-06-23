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
        <button class="btn btn-primary my-5"><a href="ajouthotel.php" class="text-light">Ajouter hotel</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Emplacement</th>
                    <th scope="col">Description</th>
                    <th scope="col">Email</th>
                    <th scope="col">Site</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from hotel";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nom = $row['nom'];
                        $adresse = $row['adresse'];
                        $categorie = $row['categorie'];
                        $emplacement = $row['emplacement'];
                        //$photo = $row['photo'];
                        $description = $row['description'];
                        $email = $row['email'];
                        $site = $row['site'];
                        echo '<tr>
            <th scope="row">' . $id . '</th>
             <td>' . $nom . '</td>
            <td>' . $adresse . '</td>
            <td>' . $categorie . '</td>
            <td>' . $emplacement . '</td>
            <td>' . $description . ' </td>
            <td> ' . $email . '</td>
            <td> ' . $site . '</td>
            
            <td>
            <button class="btn btn-primary"><a href="modifierh.php?modifieid=' . $id . '" class="text-light">Modifier</a></button>
            <button class="btn btn-danger"><a href="supprimerh.php?supprimeid=' . $id . '" class="text-light">Supprimer</a></button>
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