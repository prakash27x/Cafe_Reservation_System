<?php
include('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form bata data linako lagi
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact_us (name, email, subject, message) 
                VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo'';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9b6401d2ee.js" crossorigin="anonymous"></script>
    <link href="css/index.css"rel="stylesheet" type="text/css">
    <link href="css/contact.css"rel="stylesheet" type="text/css">
    <title>Contact Us</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.155);">
        <div class="container-fluid">
          <img src="dMODE.jpg" width="4%">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
      
        <div class="row" style="padding: 3rem;">
                <div class="col-md-7">
                    <div class="row">
                        <div class="section-header section-header--fixed-width">
                            <span class="section-header__tag section-header__tag--sideLine">CONTACT US</span>
                            <h2 class="section-header__title section-header__title-2">Get in Touch</h2>
                            <p style="font-size: 1.1rem;">Namaste and welcome to the best cafe reservation hub located in Koteshwor, Kathmandu, where a world of authentic Nepalese cultural experience awaits you with true traditional Nepalese hospitality.</p>
                        </div>
                    </div>
                    <class class="row">
                        <div class="">
                            <div id="icons-item" class="icons-item"><i class="fa-solid fa-phone"></i>
                                <span  class="contact-title phone">Call Us:</span> 
                                    <a href="tel:+9779863287455" class="tel-link"> +977 9809744015</a>
                            </div>
                        </div>
                        <div class="">
                            <div class="icons-item">
                                 <i class="fa-solid fa-envelope"></i>
                                 <span class="contact-title email">Email Us:</span> 
                                 <a href="mailto:info@cafereservehub.com.np" class="email-link">
                                        info@cafeReserveHub.com.np</a>
                            </div>
                        </div>
                    </class>
                    <div class="row">
                        <div class="">
                            <div class="icons-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                        Location: Koteshwor, Kathmandu Nepal
                            </div>
                        </div>
                        <div class=""> 
                            <div class="icons-item"> 
                                <i class="fa-regular fa-clock"></i>
                                     Opening Time: Open 24 X 7
                            </div>
                        </div>
                        <div class="contact__map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7066.954989375123!2d85.3387379!3d27.6716332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19e8af4a5fe3%3A0x963d00cdf478c6b6!2sNepal+College+Of+Information+Technology!5e0!3m2!1sen!2snp!4v1438052450258" width="800" height="185" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5" id="contact-form">
                    <div class="contact-form_inside">
                        <form action="contact.php" method="post">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" required> <br>
                            <label for="Email">Email</label>
                            <input type="email" name="email" id="email" required> <br>
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" required> <br>
                            <label for="message">Message</label>
                            <textarea type="text" name="message" id="message" required> </textarea>
                            <input type="submit" name="submit" value="Submit" onclick="popup_msg()">
                        </form>
                    </div>
                </div>
        </div>
        <script>
            function popup_msg(){
                alert("Thank you for your message. We will get back to you soon.");
            }
        </script>

        <footer class="footer" id="footer">
            <div class="row">
                <div class="col-md-4" id="footer_head_item">
                    <h5>Address</h5>
                    <p>Koteshwor, Kathmandu</p>
                    <p>44600 Nepal</p>
                </div>
                <div class="col-md-4" id="footer_head_item">
                    <h5>Opening Hours</h5>
                    <p>Sunday-Friday: 7am-6pm</p>
                    <p>Saturday: 10am - 4:00 pm</p>
                </div>
                <div class="col-md-4" id="footer_head_item">
                    <h5>Contact Us</h5>
                    <p>Phone: 980-9744015</p>
                    <p>Email: info@crb.com.np</p>
                </div>
            </div>
            <hr class="dark-hr" id="dark-hr">
            <div class="footer_tail" id="footer_tail">
                <p>All Rights Reserved &copy; 2024 Cafe Reservation Hub  |  Developed By Team CS1.6  with <a href="https://youtube.com/c/tech4kNepal" target="_blank">Tech4K Nepal</a></p>           
            </div>

        </footer>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> </script>
  </body>
</html>