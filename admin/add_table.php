<?php
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tableNumber = $_POST["TableNo"];
        $status = $_POST["status"];

        //new table add garne 
        $sql = "INSERT INTO vacant_table (TableNo, status) VALUES ($tableNumber, '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                        alert('New table added successfully.');
                        window.location.href = 'table_status.php';
                  </script>";
        } else {
            echo "Error adding new table: " . $conn->error;
        }
    }

    $conn->close();
?>
