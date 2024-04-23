<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link href="css/booknow.css" rel="stylesheet" type="text/css">
    <title>Book Now</title>
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
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" href="menu.html">Menu</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                        <a class="nav-link" id="booknow" href="booknow.php">Book Now</a>
                    </li>
                    <li class="nav-item" id="nav-item">
                  <a class="nav-link" id="adminpanel" href="admin/login.php"><i class="fa-solid fa-user-secret" style="font-size: larger;"></i></a>
              </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
        include('config.php');
        $vacantTables = getVacantTables();

        // Function to get the total vacant tables
        function getVacantTables() {
            global $conn;

            $sql = "SELECT TableNo FROM vacant_table WHERE status = 'vacant'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } 
            else {
                return [];
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $tableNumber = $_POST["TableNo"];
            $message = $_POST["message"];


            $sql = "INSERT INTO booking (Name, Email, Phone, TableNo, Message, Date_Time) 
                    VALUES ('$name', '$email', '$phone', '$tableNumber','$message', CURRENT_TIMESTAMP)";

            if ($conn->query($sql) === TRUE) {

                $updateSql = "UPDATE vacant_table SET status = 'booked' WHERE TableNo = $tableNumber";
                $conn->query($updateSql);

                // Redirect to booknow.html after booking
                echo "<script>alert('Booking Successful!');</script>";
                header("Location: contact_response.html");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Update $vacantTables after the booking
            $vacantTables = getVacantTables();
        }
        $conn->close();
    ?>
    
    <div class="row" style="margin-top: 0.5rem;">
        <div class="col-md-7">
            <div class="container">
                <h2>Book Now</h2>
                <h7>Vacant Tables: <span id="vacant-table"><?php echo count($vacantTables); ?></span></h7>
                
                <form class="bookNowForm" id="bookNowForm" action="booknow.php" method="post">

                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="TableNo">Select Table</label>
                    <select id="TableNo" name="TableNo" required>
                        <?php
                        if (!empty($vacantTables)) {
                            foreach ($vacantTables as $table) {
                                echo "<option value='{$table['TableNo']}'>Table No: {$table['TableNo']}</option>";
                            }
                        } else {
                            echo "<option value='' disabled>All tables are booked</option>";
                        }
                        ?>
                    </select>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="3" cols="52" style="border: 1px solid balck;" required placeholder="Enter your payment Transaction Code here;"></textarea>

                    <button type="submit">Book Table</button>
                </form>
            </div>
        </div>
        <div class="col-md-4" id="notice" style=" border: 1px solid #b3890b; box-shadow: 0 4px 8px rgba(0, 0, 0.2, 0.1); padding: 1rem; border-width:50%">
            <h5 style="color: white;">**Booking Information:**</h5>
            <p>
                1. Payment Method: <br>
                - Pay Rs.50 per table through Esewa, Imepay, or Khalti. <br>
                - Enter your transaction code in the "Message" section.
            </p>
            <p>
                2. Booking Duration: <br>
                 - Reservation valid for 1 hour from the booking time. <br>
                 - Late arrivals may result in automatic cancellation.
            </p>
            <p>
                3. Refund Policy: <br>
                - No refunds after payment.
            </p>
            <p>
                Thank you for choosing us! We look forward to serving you. <br> For any queries, please contact us at 980-9744015.
            </p>
            <hr>
            <p>
                Payment Details: <br>
                    Esewa: 980-9744015 <br>
                    Imepay: 980-9744015 <br>
                    Khalti: 980-9744015
            </p>

            <style>
               #notice p{
                    /* color: white; */
                    color: black;
                    font-family: Barlow;
                }
            </style>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="booknow.js"></script>
</body>
</html>
