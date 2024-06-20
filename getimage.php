<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_hotel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hotel_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $conn->prepare("SELECT photo FROM hotel WHERE id = ?");
    $stmt->bindParam(1, $hotel_id, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->bindColumn(1, $image_data, PDO::PARAM_LOB);
    $stmt->fetch(PDO::FETCH_BOUND);

    if ($image_data) {
        header("Content-Type: image/jpeg"); // Adjust the MIME type if necessary

        echo $image_data;
    } else {
        echo "No image found for the given hotel ID.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
} finally {
    // Close the connection
    if ($conn) {
        $conn = null;
    }
}
?>
