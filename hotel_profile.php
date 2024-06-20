
<?php
    require_once './methode/db_methode.php';

    $hotels = db_methode::getHotels();

    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("entete.php");
    ?>

    <section>
       <a href="reservation.php?id=<?php echo $id;?>&c_id=<?php echo $_GET['c_id']; ?>"> <button class="btn1">Reserver</button></a>
    </section>

    <?php
        include("pied_de_page.php");
    ?>
</body>

</html>