<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM admission WHERE admission_id = admission_id ORDER BY admission_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $admission_id = $row['admission_id'];
                    $admission_header = $row['admission_header'];
                    $admission_content = $row['admission_content'];
                    $admission_top_img = $row['admission_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/admission_images/<?php echo  $admission_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--admission-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="admission">Education</a> / <a href="admission">Admission</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $admission_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $admission_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM admission_img WHERE admission_id = admission_id ORDER BY admission_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $admission_id = $row['admission_id'];
                    $admission_image = $row['admission_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/admission_images/<?php echo  $admission_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End admission-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->