<!-- Purpose: To display booking information for admin -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Booking Information</title>
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

<div class="container">
    <h2>Booking Information</h2>

    <?php
        include('config.php');

        $sql = "SELECT * FROM booking";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Table Number</th>
                            <th>Message</th>
                            <th>Date & Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['SNo']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Phone']}</td>
                        <td>{$row['TableNo']}</td>
                        <td>{$row['Message']}</td>
                        <td>{$row['Date_Time']}</td>
                        <td>
                            <a href='update_user.php?sno={$row['SNo']}' class='btn btn-warning'>Update</a>
                            <a href='#' class='btn btn-danger' onclick='confirmDelete({$row['SNo']})'>Delete</a>
                        </td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No booking information available.</p>";
        }

        $conn->close();
    ?>

    <script>
    function confirmDelete(sno) {
        var confirmDelete = confirm("Are you sure want to delete this booking?");
        if (confirmDelete) {
            window.location.href = 'delete_booking.php?sno=' + sno;
        }
    }
    </script>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
