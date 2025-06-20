<?php
$con = mysqli_connect("localhost", "root", "", "box_booking");

if (isset($_GET['turf_id'])) {
    $id = $_GET['turf_id'];
    $q = "SELECT * FROM turfs WHERE turf_id = $id";
    $res = mysqli_query($con, $q);
    $turf = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $turf['turf_name'] ?> - Details</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        .details {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }
        h2 { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="details">
        <img src="<?= $turf['image'] ?>" alt="<?= $turf['turf_name'] ?>">
        <h2><?= $turf['Cyclone Box'] ?></h2>
        <p><strong>📍 Location:</strong> <?= $turf['Highway 25'] ?></p>
        <p><strong>💸 Price:</strong> ₹<?= $turf['900/hour'] ?>/hour</p>
        <p><strong>📝 Description:</strong> <?= $turf['description'] ?: 'No description available.' ?></p>
        <a href="booking.php?turf_id=<?= $turf['1'] ?>" class="btn">Book Now 🏏</a>
    </div>
</body>
</html>
