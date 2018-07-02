<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM internship WHERE internship_id = internship_id ORDER BY internship_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $internship_id = $row['internship_id'];
                    $internship_header = $row['internship_header'];
                    $internship_content = $row['internship_content'];
                    $internship_top_img = $row['internship_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/internship_images/<?php echo  $internship_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--internship-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
         <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="professional_year">Others</a> / <a href="internship">Internship</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $internship_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $internship_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM internship_img WHERE internship_id = internship_id ORDER BY internship_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $internship_id = $row['internship_id'];
                    $internship_image = $row['internship_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/internship_images/<?php echo  $internship_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End internship-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->