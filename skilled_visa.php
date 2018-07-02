<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM skilled_visa WHERE skilled_visa_id = skilled_visa_id ORDER BY skilled_visa_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $skilled_visa_id = $row['skilled_visa_id'];
                    $skilled_visa_header = $row['skilled_visa_header'];
                    $skilled_visa_content = $row['skilled_visa_content'];
                    $skilled_visa_top_img = $row['skilled_visa_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/skilled_visa_images/<?php echo  $skilled_visa_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--skilled_visa-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="student_visa">Migration</a> / <a href="skilled_visa">Skilled Migration Visa</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $skilled_visa_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $skilled_visa_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM skilled_visa_img WHERE skilled_visa_id = skilled_visa_id ORDER BY skilled_visa_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $skilled_visa_id = $row['skilled_visa_id'];
                    $skilled_visa_image = $row['skilled_visa_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/skilled_visa_images/<?php echo  $skilled_visa_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End skilled_visa-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->