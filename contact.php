<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>


        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 5";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $top_image_id = $row['top_image_id'];
                    $top_image_image = $row['top_image_image'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/top_images/<?php echo  $top_image_image ; ?>" alt="">
            <div class="overlay"></div>
        </section>
<?php } ?>
        <!--End Cover-->


        <!--List Contact-->
        <main>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-head">
                                <h1>Get In Touch With Us</h1>
                                <h5>Bright Education & Migration Services</h5>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="contact-form">

 <?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "arifrraju@gmail.com";
    $email_subject = "Bright Education";
 
    function died($error) {
        // your error code can go here


        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if( !isset($_POST['name']) ||
        !isset($_POST['number']) ||        
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $number = $_POST['number']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Contact Details:\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Phone Number: ".clean_string($number)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<?php
echo "<h5 style='color:#077647; text-align:center;'><b>Your contact details has been sent!</b></h5>";
?>
 
<?php
 
}
?>

                                <form action="" method="post">
                                    <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                                    <input class="form-control" type="number" name="number" placeholder="Phone Number" required>
                                    <input class="form-control" type="email" name="email" placeholder="Your Email" required>
                                    <input class="form-control" type="text" name="subject" placeholder="Subject" required>
                                    <textarea name="message" placeholder="Message" class="form-control" required></textarea>
                                    <button type="submit" class="" name="submit">submit now <i class="fa fa-arrow-circle-right"></i></button>
                                </form>


                               

                       </div>
                    </div>



                        <div class="col-md-4">
                            <div class="cont-address">
                                <div class="c-address">
                                    <div>
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div>
                                        105 Railway Street<br>
                                        Rockdale NSW 2216 <br>
                                        Australia
                                    </div>
                                </div>
                                <div class="c-email">
                                    <div>
                                        <i class="fa fa-send-o"></i>
                                    </div>
                                    <div>
                                        <a style="color: #333;" href="mailto:info@brightedu.com.eu?Subject=Hello%20again" target="_top">info@brightedu.com.au</a>
                                        <br>
                                        <a style="color: #333;" href="mailto:zaved@brightedu.com.au?Subject=Hello%20again" target="_top">zaved@brightedu.com.au</a>
                                    </div>
                                </div>
                                <div class="c-mobile">
                                    <div>
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div>
                                        + 02 9567 5306,
                                        <br>
                                        + 0433 254 740 
                                        <br>
                                        + 0466 630 066 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.5502322908483!2d151.13370001487354!3d-33.952694380633076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b9ff5cf97e45%3A0xfd5cbe4bfea404ac!2s105+Railway+St%2C+Rockdale+NSW+2216%2C+Australia!5e0!3m2!1sen!2sbd!4v1490772596031"  width="100%" height="350px" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        <!--End Contact-->

<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->