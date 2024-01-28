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
</body>
</html>


<div class="container">
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $idToDelete = $_POST['delete'];
    
    $deleteSql = "DELETE FROM contact_us WHERE SNo = $idToDelete";
    if ($conn->query($deleteSql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM contact_us";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Contact Us Messages</h2>";
    echo "<table class='table'>
            <tbody>
                <tr>
                    <th>SNo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </tbody>
            ";

    // Display Output data for each row with delete option
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['SNo']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Subject']}</td>
                <td>{$row['Message']}</td>
                <td>
                    <form method='post' onsubmit='return confirmDelete();'>
                        <input type='hidden' name='delete' value='{$row['SNo']}'>
                        <button type='submit' class='btn btn-danger'>Delete</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No messages found.</p>";
}

$conn->close();
?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>



<style>
    tr th,td{
        padding: 5px;
    }
    tr:nth-child(even){
        background-color: #f2f2f2;
    }
    tr:hover{
        background-color: #ddd;
    }
</style>
</div>