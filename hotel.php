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
    include("entete1.php");
    ?>
    <?php echo $_SESSION['id'];?>

<section>
    <div class="hotels">
    <?php foreach ($hotels as $hotel): ?>
        <div class="hotel">
            <img src="getimage.php?id=<?php echo $hotel['id']; ?>"/>
            <a href="hotel_profile.php?id=<?php echo $hotel['id']; ?>&c_id=<?php echo $_SESSION['id']; ?>"><h2><?php echo htmlspecialchars($hotel['nom']); ?></h2></a>
            <p><?php echo htmlspecialchars($hotel['description']); ?></p>
        </div>
    <?php endforeach; ?>
    </div>
</section>

<?php
    include("pied_de_page.php");
?>
</body>
</html>