
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
<div class="container">
 <button class="btn btn-primary my-5"><a href="reservationAgent.php" class="text-light">Ajouter reservation</a></button>
 <table class="table">
    <thead>
        <tr>
            <th scope="col">no</th>
            <th scope="col">Nombre_personnes</th>
            <th scope="col">Date_arrive</th>
            <th scope="col">Date_depart</th>
            <th scope="col">Type_chambre</th>
            <th scope="col">Options</th>
            <th scope="col">Demandes particulieres</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Genre</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Informations</th>
            <th scope="col">CNIB</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>

      <?php
       $sql="select * from reservation"; 
       $requete="select * from client";
       $result=mysqli_query($con,$sql);
       $resultat=mysqli_query($con,$requete);

       if($result && $resultat ){
        while($row=mysqli_fetch_assoc($result) AND $rows=mysqli_fetch_assoc($resultat)){
            $id=$row['id'];
            $nb_personne=$row['nb_personne'];
            $date_arrive=$row['date_arrive'];
            $date_depart=$row['date_depart'];
            $type=$row['type'];
            $options=$row['options'];
            $demande=$row['demande'];
            $nom=$rows['nom'];
            $prenom=$rows['prenom'];
            $genre=$rows['genre'];
            $email=$rows['email'];
            $telephone=$rows['telephone'];
            $password=$rows['password'];
            $information=$row['information'];
            $cnib=$rows['cnib'];
            
            echo '<tr>
            <th scope="row">'.$id.'</th>
             <td>'.$nb_personne.'</td>
            <td>'. $date_arrive.'</td>
            <td>'.$date_depart.'</td>
            <td>'.$type.'</td>
            <td> '.$options.'</td>
            <td>'.$demande.' </td>
            <td>'.$nom.'</td>
            <td>'.$prenom.'</td>
            <td>'.$genre.'</td>
            <td> '.$email.'</td>
            <td>'.$telephone.'</td>
            <td>'.$password.' </td>
            <td> '.$information.'</td>
            <td> '.$cnib.'</td>
            
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