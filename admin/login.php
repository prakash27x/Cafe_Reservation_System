<?php
include 'config.php';

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $_SESSION['loggedin'] = true;
    $username = $_POST['username'];
    $password = $_POST['password'];

   $stmt = $conn->prepare("SELECT username,password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($username,$pass);
    $stmt->fetch();
    $stmt->close();
    if ($password==$pass && $username==$username){
        
        $_SESSION['status'] = "logged_in";
        $_SESSION['user'] = $username;
        header("Location: admin.html");
        exit();
    } else {
        // if Authentication failed, it may display an error message
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Invalid Credentials</div>";
        // header("Location: index.php");

    }
}
$conn->close();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
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
                </div>
            </nav>

    <div class="container my-4">
     <h2 class="text-center">Admin Login Portal</h2>
     <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>