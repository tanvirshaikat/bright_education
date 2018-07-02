<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM what_rpl WHERE what_rpl_id = what_rpl_id ORDER BY what_rpl_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $what_rpl_id = $row['what_rpl_id'];
                    $what_rpl_header = $row['what_rpl_header'];
                    $what_rpl_content = $row['what_rpl_content'];
                    $what_rpl_top_img = $row['what_rpl_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/what_rpl_images/<?php echo  $what_rpl_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--what_rpl-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="what_rpl">RPL</a> / <a href="what_rpl">What Is RPL</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $what_rpl_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $what_rpl_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM what_rpl_img WHERE what_rpl_id = what_rpl_id ORDER BY what_rpl_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $what_rpl_id = $row['what_rpl_id'];
                    $what_rpl_image = $row['what_rpl_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/what_rpl_images/<?php echo  $what_rpl_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End what_rpl-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->