<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM oshc WHERE oshc_id = oshc_id ORDER BY oshc_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $oshc_id = $row['oshc_id'];
                    $oshc_header = $row['oshc_header'];
                    $oshc_content = $row['oshc_content'];
                    $oshc_top_img = $row['oshc_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/oshc_images/<?php echo  $oshc_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--oshc-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
           <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="professional_year">Others</a> / <a href="oshc">OSHC</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $oshc_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $oshc_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM oshc_img WHERE oshc_id = oshc_id ORDER BY oshc_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $oshc_id = $row['oshc_id'];
                    $oshc_image = $row['oshc_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/oshc_images/<?php echo  $oshc_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End oshc-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->