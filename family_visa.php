<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM family_visa WHERE family_visa_id = family_visa_id ORDER BY family_visa_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $family_visa_id = $row['family_visa_id'];
                    $family_visa_header = $row['family_visa_header'];
                    $family_visa_content = $row['family_visa_content'];
                    $family_visa_top_img = $row['family_visa_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/family_visa_images/<?php echo  $family_visa_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--family_visa-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
         <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="student_visa">Migration</a> / <a href="family_visa">Family Visa</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $family_visa_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $family_visa_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM family_visa_img WHERE family_visa_id = family_visa_id ORDER BY family_visa_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $family_visa_id = $row['family_visa_id'];
                    $family_visa_image = $row['family_visa_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/family_visa_images/<?php echo  $family_visa_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End family_visa-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->