<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM education_provider WHERE education_provider_id = education_provider_id ORDER BY education_provider_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $education_provider_id = $row['education_provider_id'];
                    $education_provider_header = $row['education_provider_header'];
                    $education_provider_content = $row['education_provider_content'];
                    $education_provider_top_img = $row['education_provider_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/education_provider_images/<?php echo  $education_provider_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--education_provider-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="admission">Education</a> / <a href="education_provider">Education Provider</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $education_provider_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $education_provider_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM education_provider_img WHERE education_provider_id = education_provider_id ORDER BY education_provider_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $education_provider_id = $row['education_provider_id'];
                    $education_provider_image = $row['education_provider_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/education_provider_images/<?php echo  $education_provider_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End education_provider-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->