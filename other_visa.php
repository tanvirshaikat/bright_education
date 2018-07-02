<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM other_visa WHERE other_visa_id = other_visa_id ORDER BY other_visa_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $other_visa_id = $row['other_visa_id'];
                    $other_visa_header = $row['other_visa_header'];
                    $other_visa_content = $row['other_visa_content'];
                    $other_visa_top_img = $row['other_visa_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/other_visa_images/<?php echo  $other_visa_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--other_visa-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
           <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="student_visa">Migration</a> / <a href="other_visa">Other Visa</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $other_visa_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $other_visa_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM other_visa_img WHERE other_visa_id = other_visa_id ORDER BY other_visa_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $other_visa_id = $row['other_visa_id'];
                    $other_visa_image = $row['other_visa_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/other_visa_images/<?php echo  $other_visa_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End other_visa-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->