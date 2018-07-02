<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM bench_mark WHERE bench_mark_id = bench_mark_id ORDER BY bench_mark_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $bench_mark_id = $row['bench_mark_id'];
                    $bench_mark_header = $row['bench_mark_header'];
                    $bench_mark_content = $row['bench_mark_content'];
                    $bench_mark_top_img = $row['bench_mark_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/bench_mark_images/<?php echo  $bench_mark_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--bench_mark-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
           <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="professional_year">Others</a> / <a href="bench_mark">Bench Mark Training</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $bench_mark_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $bench_mark_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM bench_mark_img WHERE bench_mark_id = bench_mark_id ORDER BY bench_mark_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $bench_mark_id = $row['bench_mark_id'];
                    $bench_mark_image = $row['bench_mark_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/bench_mark_images/<?php echo  $bench_mark_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End bench_mark-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->