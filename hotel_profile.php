
<?php
    require_once './methode/db_methode.php';

    $hotels = db_methode::getHotels();
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

    <h1> nos differents hotels</h1>
    <section>
        <H1>Profile des hotels</H1>
        </div>
    </section>

    <?php
        include("pied_de_page.php");
    ?>
</body>

</html>