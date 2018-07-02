<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>

        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 4";
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

        <!--List Of Promotion-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="#"><i class="fa fa-home"></i></a> / <a href="">Promotion</a></p>
                    </div>
                </div>
            </section>
            <section class="rpl-p">
                <div class="container">
                    <div class="row">
                        <div class="flex-cntn">


<?php 

            $query = "SELECT * FROM posts ";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'] ,0,200);
                    $post_status = $row['post_status'];

                    if ($post_status == 'published'){ 
                        
 
                    ?>


                            <div class="rplflexbox">
                                <img src="images/promotion/<?php echo $post_image; ?>" alt="" height="170px">
                                <div class="rplflexcntn">
                                    <span class="boxicon"><i class="fa fa-graduation-cap"></i></span>
                                    <h3><?php echo $post_title; ?></h3>
                                    <p>
                                        <?php echo $post_content; ?>

                                    </p>
                                    <br>
                                    <a href="promotion_details.php?p_id=<?php echo $post_id; ?>"><span>Read More</span></a>
                                </div>
                            </div>


                    
                    <?php   } }  ?>


                           

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--END List Of Promotion-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->