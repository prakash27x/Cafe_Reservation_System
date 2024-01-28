<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["sno"])) {
    $sno = $_GET["sno"];

    $sql = "DELETE FROM booking WHERE SNo = $sno";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Booking information deleted successfully.');
                window.location.href = 'booking.php';
              </script>";
    } else {
        echo "Error deleting booking information: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
