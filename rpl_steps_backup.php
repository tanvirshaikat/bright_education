<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM rpl_steps WHERE rpl_steps_id = rpl_steps_id ORDER BY rpl_steps_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $rpl_steps_id = $row['rpl_steps_id'];
                    $rpl_steps_header = $row['rpl_steps_header'];
                    $rpl_steps_content = $row['rpl_steps_content'];
                    $rpl_steps_top_img = $row['rpl_steps_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/rpl_steps_images/<?php echo  $rpl_steps_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--rpl_steps-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="what_rpl">RPL</a> / <a href="rpl_steps">RPL Steps</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $rpl_steps_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $rpl_steps_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM rpl_steps_img WHERE rpl_steps_id = rpl_steps_id ORDER BY rpl_steps_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $rpl_steps_id = $row['rpl_steps_id'];
                    $rpl_steps_image = $row['rpl_steps_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/rpl_steps_images/<?php echo  $rpl_steps_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End rpl_steps-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->