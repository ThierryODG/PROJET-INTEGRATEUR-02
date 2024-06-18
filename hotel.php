
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
        <div class="hotels">
            <?php
                foreach ($hotels as $hotel) {
                    echo "<div class=\"hotel\"><img src=\"data:image/jpeg;base64," . base64_encode($hotel['photo']) . "\" alt=\"Image de l'hôtel\">
                            <h1>" . htmlspecialchars($hotel['nom']) . "</h1>
                            <p>" . htmlspecialchars($hotel['description']) . "</p></div>";
                }
            ?>
            
            s
        </div>
    </section>

    <?php
        include("pied_de_page.php");
    ?>

</body>

</html>