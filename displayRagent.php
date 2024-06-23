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
</head>

<body>
<div class="container">
 <button class="btn btn-primary my-5"><a href="reservationAgent.php" class="text-light">Ajouter reservation</a></button>
 <table class="table">
    <thead>
        <tr>
            <th scope="col">no</th>
            <th scope="col">id client</th>
            <th scope="col">id hotel</th>
            <th scope="col">Date arrive</th>
            <th scope="col">Date depart</th>
            <th scope="col">Status confirmation</th>
            <th scope="col">Nombre personnes</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

      <?php
      /*
       $sql = "SELECT r.id, r.nb_personne, r.date_arrive, r.date_depart, r.status_confirmation, c.nom, c.prenom, c.genre, c.email, c.telephone, c.cnib 
               FROM reservation r
               JOIN client c ON r.id_client = c.id"; 
        */

        $sql = "SELECT * FROM reservation"; 
       $result = mysqli_query($con, $sql);

       if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $nb_personne = $row['nb_personne'];
            $date_arrive = $row['date_arrive'];
            $date_depart = $row['date_depart'];
            $status_confirmation = $row['statut_confirmation'];
            $id_client = $row['id_client'];
            $id_hotel = $row['id_hotel'];

            echo '<tr>
            <th scope="row">'.$id.'</th>
             <td>'.$id_client.'</td>
             <td>'.$id_hotel.'</td>
            <td>'. $date_arrive.'</td>
            <td>'.$date_depart.'</td>
            <td>'.$status_confirmation.'</td>
            <td>'.$nb_personne.'</td>
            <td>
                <button class="btn btn-primary"><a href="modifierRagent.php?modifieid='.$id.'" class="text-light">Modifier</a></button>
                <button class="btn btn-danger"><a href="supprimerRagent.php?supprimeid='.$id.'" class="text-light">Supprimer</a></button>
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
