<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>

        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 6";
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

        <!--About-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="group_classes">IELTS/PTE</a> / <a href="ourTeachers">Our Teachers</a> </p>
                    </div>
                </div>
            </section>


            <!--OUR Teacher-->
            <section>
                <div class="container">
                    <div class="row">

                        <div class="ts-head">
                            <h1>OUR TEACHERS</h1>
                        </div>

                        <div class="teamwrap">
                            <div>
                                <img src="img/profile.png" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <!-- <div class="t-icon">
                                        <span><i class="fa fa-facebook"></i></span>
                                        <span><i class="fa fa-skype"></i></span>
                                        <span><i class="fa fa-twitter"></i></span>
                                        <span><i class="fa fa-linkedin"></i></span>
                                        <span><i class="fa fa-youtube"></i></span>
                                    </div> -->
                                    <p>Qualification: </p>
                                    <p>Present Status: </P>
                                </div>
                            </div>
                            <div>
                                <img src="img/profile.png" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <!-- <div class="t-icon">
                                        <span><i class="fa fa-facebook"></i></span>
                                        <span><i class="fa fa-skype"></i></span>
                                        <span><i class="fa fa-twitter"></i></span>
                                        <span><i class="fa fa-linkedin"></i></span>
                                        <span><i class="fa fa-youtube"></i></span>
                                    </div> -->
                                    <p>Qualification: </p>
                                    <p>Present Status: </P>
                                </div>
                            </div>
                            <div>
                                <img src="img/profile.png" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <!-- <div class="t-icon">
                                        <span><i class="fa fa-facebook"></i></span>
                                        <span><i class="fa fa-skype"></i></span>
                                        <span><i class="fa fa-twitter"></i></span>
                                        <span><i class="fa fa-linkedin"></i></span>
                                        <span><i class="fa fa-youtube"></i></span>
                                    </div> -->
                                    <p>Qualification: </p>
                                    <p>Present Status: </P>
                                </div>
                            </div>
                            <div>
                                <img src="img/profile.png" alt="">
                                <div style="text-align:center">
                                    <h3>TIM COCK</h3>
                                    <!-- <div class="t-icon">
                                        <span><i class="fa fa-facebook"></i></span>
                                        <span><i class="fa fa-skype"></i></span>
                                        <span><i class="fa fa-twitter"></i></span>
                                        <span><i class="fa fa-linkedin"></i></span>
                                        <span><i class="fa fa-youtube"></i></span>
                                    </div> -->
                                    <p>Qualification: </p>
                                    <p>Present Status: </P>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <!--END OUR Teacher-->
        </main>
        <!--End About-->



<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->