<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sno = $_POST["sno"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Update user information of table booking
    $sql = "UPDATE booking SET Name='$name', Email='$email', Phone='$phone' WHERE SNo=$sno";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                         alert('User information updated successfully.');
                         window.location.href = 'booking.php';
              </script>";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

$conn->close();
?>
