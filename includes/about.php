<?php include "header.php" ?>

<?php include "header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM about_us WHERE about_id = about_id ORDER BY about_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $about_id = $row['about_id'];
                    $about_header = $row['about_header'];
                    $about_content = $row['about_content'];
                    $about_top_img = $row['about_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="../images/about_images/<?php echo  $about_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--About-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="#"><i class="fa fa-home"></i></a> / <a href="">About</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $about_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $about_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM about_img WHERE about_id = about_id ORDER BY about_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $about_id = $row['about_id'];
                    $about_image = $row['about_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="../images/about_images/<?php echo  $about_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!--OUR TEAM-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 abg">
                            <div class="team-head">
                                <h1>OUR TEAMS</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="teamwrap">
                            <div>
                                <img src="img/8.jpg" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <p>INSURANCE ADVISOR</p>
                                </div>
                            </div>
                            <div>
                                <img src="img/10.jpg" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <p>INSURANCE ADVISOR</p>
                                </div>
                            </div>
                            <div>
                                <img src="img/8.jpg" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <p>INSURANCE ADVISOR</p>
                                </div>
                            </div>
                            <div>
                                <img src="img/10.jpg" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <p>INSURANCE ADVISOR</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--END OUR TEAM-->
        </main>
        <!--End About-->


<!-- Footer -->
<?php include "footer.php" ?>
<!-- Footer -->