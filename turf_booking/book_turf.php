<?php
$con = mysqli_connect("localhost", "root", "", "box_booking");
$q = "SELECT * FROM turfs";
$result = mysqli_query($con, $q);
?>

<div class="container">
<?php
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['turf_id'];
    $name = $row['turf_name'];
    $location = $row['location'];
    $price = $row['price_per_hour'];
    $image = $row['image'] ?: 'default_turf.jpg';

    echo "
    <div class='card' onclick=\"window.location.href='turf_details.php?turf_id=$id'\">
        <img src='$image' alt='$name'>
        <h3>$name</h3>
        <p>📍 $location</p>
        <p>💰 ₹$price / hour</p>
        <button class='btn'>Book Now 🏏</button>
    </div>";
}
?>
</div>
