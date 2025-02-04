<?php
$file = 'reservations.txt';

// Create the file if it doesn't exist
if (!file_exists($file)) {
    file_put_contents($file, '');
}

$name = $_POST['name'];
$email = $_POST['email'];
$room = $_POST['room'];
$date = $_POST['date'];

// Check if the date is already booked
$reservations = file_get_contents($file);
if (strpos($reservations, $date) !== false) {
    echo "<div class='alert alert-danger'>Sorry, the selected date is already booked.</div>";
    exit;
}

// Save the reservation
$reservation = "Name: $name, Email: $email, Room: $room, Date: $date\n";
file_put_contents($file, $reservation, FILE_APPEND);

echo "<div class='alert alert-success'>Reservation successfully booked!</div>";
?>