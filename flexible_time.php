<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM flexible_time WHERE flexible_time_id = flexible_time_id ORDER BY flexible_time_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $flexible_time_id = $row['flexible_time_id'];
                    $flexible_time_header = $row['flexible_time_header'];
                    $flexible_time_content = $row['flexible_time_content'];
                    $flexible_time_top_img = $row['flexible_time_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/flexible_time_images/<?php echo  $flexible_time_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--flexible_time-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="group_classes">IELTS/PTE</a> / <a href="flexible_time">Flexible Time-Tables</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $flexible_time_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $flexible_time_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM flexible_time_img WHERE flexible_time_id = flexible_time_id ORDER BY flexible_time_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $flexible_time_id = $row['flexible_time_id'];
                    $flexible_time_image = $row['flexible_time_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/flexible_time_images/<?php echo  $flexible_time_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End flexible_time-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->