<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM employment_visa WHERE employment_visa_id = employment_visa_id ORDER BY employment_visa_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $employment_visa_id = $row['employment_visa_id'];
                    $employment_visa_header = $row['employment_visa_header'];
                    $employment_visa_content = $row['employment_visa_content'];
                    $employment_visa_top_img = $row['employment_visa_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/employment_visa_images/<?php echo  $employment_visa_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--employment_visa-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="student_visa">Migration</a> / <a href="employment_visa">Employment Sponsor Visa</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $employment_visa_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $employment_visa_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM employment_visa_img WHERE employment_visa_id = employment_visa_id ORDER BY employment_visa_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $employment_visa_id = $row['employment_visa_id'];
                    $employment_visa_image = $row['employment_visa_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/employment_visa_images/<?php echo  $employment_visa_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End employment_visa-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->