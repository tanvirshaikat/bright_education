<?php include "includes/header.php" ?>



<!--MENU-->
<?php include "includes/header_navigation.php" ?>
<!--//MENU-->

        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 3";
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
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact-head">
                                <h1><b>Apply Now</b></h1>
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact-form">
                            
                            
                            
   <?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "arifrraju@gmail.com";
    $email_subject = "Apply Now Bright Education";
 
    function died($error) {
        // your error code can go here


        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo $error."<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if( //!isset($_POST['certificate']) ||
        !isset($_POST['name']) ||
        !isset($_POST['number']) ||        
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
    //$name = $_POST['certificate'];
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
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Apply Now Form Details:\n\n";
 
     
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
echo "<h5 style='color:#077647; text-align:center;'><b>Your information has been sent!</b></h5>";
?> 
<?php
 
}
?>                                    
                            
                            
                            
                            
                            
                                <form action="" method="post">


<?php 

// if (isset($_GET['p_id'])) {
//     $the_details_id = $_GET['p_id'];
// }



// $query = "SELECT * FROM details WHERE details_id = $the_details_id ";
//     $select_all_details_query = mysqli_query($connection, $query);

//     if ($row = mysqli_fetch_assoc($select_all_details_query)) {
//         $details_id = $row['details_id'];
//         $details_certificate = $row['details_certificate'];

        ?>

                                    <!-- <b><input type="text" name="certificate"  value="Certificate Name : <?php echo $details_certificate; ?>" disabled class="form-control" style="border:1px #0f304c solid;"></b> -->
<?php //} ?>
                                    <input class="form-control" type="text" name="name" placeholder="Your Name" style="border:1px #0f304c solid;" required>
                                    <input class="form-control" type="number" name="number" placeholder="Phone Number"style="border:1px #0f304c solid;" required>
                                    <input class="form-control" type="email" name="email" placeholder="Your Email" style="border:1px #0f304c solid;" required>
                                    <input class="form-control" type="text" name="subject" placeholder="Subject" style="border:1px #0f304c solid;" required>
                                    <textarea name="message" placeholder="Message" class="form-control" style="border:1px #0f304c solid;"  required></textarea>
                                    <button type="submit" class="" name="submit">submit now <i class="fa fa-arrow-circle-right"></i></button>
                                </form>


                     

                       </div>
                    </div>


                    </div>
                </div>
            </section>
<?php include "includes/footer.php" ?>
