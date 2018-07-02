<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM professional_year WHERE professional_year_id = professional_year_id ORDER BY professional_year_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $professional_year_id = $row['professional_year_id'];
                    $professional_year_header = $row['professional_year_header'];
                    $professional_year_content = $row['professional_year_content'];
                    $professional_year_top_img = $row['professional_year_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/professional_year_images/<?php echo  $professional_year_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--professional_year-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
          <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="professional_year">Others</a> / <a href="professional_year">Professional Year</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $professional_year_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $professional_year_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM professional_year_img WHERE professional_year_id = professional_year_id ORDER BY professional_year_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $professional_year_id = $row['professional_year_id'];
                    $professional_year_image = $row['professional_year_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/professional_year_images/<?php echo  $professional_year_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End professional_year-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->