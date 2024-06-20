<?php
    require_once './methode/db_methode.php';
    $hotels = db_methode::getHotels();
    //session_start(); // Ensure session is started
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Hotels</title>
</head>

<body>
    <?php
        include("entete1.php");
    ?>
    <section>
        <div class="hotels">
        <?php if ($hotels): ?>
            <?php foreach ($hotels as $hotel): ?>
                <div class="hotel">
                    <img src="getimage.php?id=<?php echo htmlspecialchars($hotel['id']); ?>" alt="Hotel Image"/>
                    <a href="hotel_profile.php?id=<?php echo htmlspecialchars($hotel['id']); ?>&c_id=<?php echo isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id']) : 'unknown'; ?>">
                        <h2><?php echo htmlspecialchars($hotel['nom']); ?></h2>
                    </a>
                    <p><?php echo htmlspecialchars($hotel['description']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hotels found.</p>
        <?php endif; ?>
        </div>
    </section>
    <?php
        include("pied_de_page.php");
    ?>
</body>
</html>
