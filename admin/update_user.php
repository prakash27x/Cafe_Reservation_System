<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Update User Information</title>
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
    <h2>Update User Information</h2>

    <?php
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sno'])) {
        $sno = $_GET['sno'];

        $sql = "SELECT * FROM booking WHERE SNo = $sno";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Display the form with the user details
            echo "<form method='post' action='process_update.php'>
                    <input type='hidden' name='sno' value='{$row['SNo']}'>
                    <div class='mb-3'>
                        <label for='name' class='form-label'>Name</label>
                        <input type='text' class='form-control' id='name' name='name' value='{$row['Name']}' required>
                    </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Email</label>
                        <input type='email' class='form-control' id='email' name='email' value='{$row['Email']}' required>
                    </div>
                    <div class='mb-3'>
                        <label for='phone' class='form-label'>Phone</label>
                        <input type='tel' class='form-control' id='phone' name='phone' value='{$row['Phone']}' required>
                    </div>
                    <button type='submit' class='btn btn-primary'>Update User</button>
                </form>";
        } else {
            echo "<p>User not found.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }

    $conn->close();
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>
</html>
