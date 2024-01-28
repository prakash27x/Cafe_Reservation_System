<?php
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tableNumber = $_POST["TableNo"];

        $sql = "DELETE FROM vacant_table WHERE TableNo = $tableNumber";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                        alert('Table deleted successfully.');
                        window.location.href = 'table_status.php';
                  </script>";
        } else {
            echo "Error deleting table: " . $conn->error;
        }
    }
    $conn->close();
?>