<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Status</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            padding: 2rem;
        }

        h4 {
            color:#007bff;
        }

        table {
            margin-top: 20px;
        }
        th, td {
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: black;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 10px;
            max-width: 400px;
            display: inline-block;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px;
            cursor: pointer;
        }
        .delete-btn {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar"
        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.155);">
        <div class="container-fluid">
            <img src="dMODE.jpg" width="4%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" href="admin.html">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <?php
        include('config.php');
        $sql = "SELECT * FROM vacant_table";
        $result = $conn->query($sql);

        echo "<h4>Tables Status</h4>";
        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Table Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['TableNo']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <form method='post' action='delete_table.php' style='display:inline;'>
                                <input type='hidden' name='TableNo' value='{$row['TableNo']}'>
                                <button type='submit' onclick='confirmDelete()' class='btn btn-sm delete-btn'>Delete</button>
                            </form>
                        </td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No records found.</p>";
        }
        $conn->close();
    ?>

<?php
include('config.php');

$checkStatus = "SELECT vacant_table.TableNo, booking.TableNo as bookedTableNo 
                FROM vacant_table 
                LEFT JOIN booking ON vacant_table.TableNo = booking.TableNo";

$checkResult = mysqli_query($conn, $checkStatus);

if ($checkResult) {
    while ($row = mysqli_fetch_assoc($checkResult)) {
        $vacantTableNo = $row['TableNo'];
        $bookedTableNo = $row['bookedTableNo'];

        if ($bookedTableNo !== NULL) {
            // table book xa vane: update the status in vacant_table
            $updateSql = "UPDATE vacant_table SET status='booked' WHERE TableNo=$vacantTableNo";
            mysqli_query($conn, $updateSql);
        } else {
            // table vacant xa vane: update the status in vacant_table
            $updateSql = "UPDATE vacant_table SET status='vacant' WHERE TableNo=$vacantTableNo";
            mysqli_query($conn, $updateSql);
        }
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>


    <h4>Add New Table</h4>
    <form method='post' action='add_table.php'>
        <label for='TableNo'>Table No:</label>
        <input type='number' id='TableNo' name='TableNo' required>

        <label for='status'>Status:</label>
        <input type='text' id='status' name='status' required>

        <button type='submit' class='btn btn-success'>Add Table</button>
    </form>
    <script>
        function confirmDelete() {
            var confirmDelete = confirm("Are you sure you want to delete this table?");
            if (confirmDelete) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
