<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM our_agent WHERE our_agent_id = our_agent_id ORDER BY our_agent_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $our_agent_id = $row['our_agent_id'];
                    $our_agent_header = $row['our_agent_header'];
                    $our_agent_content = $row['our_agent_content'];
                    $our_agent_top_img = $row['our_agent_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/our_agent_images/<?php echo  $our_agent_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--our_agent-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="student_visa">Migration</a> / <a href="our_agent">Our Migration Agent</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $our_agent_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $our_agent_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM our_agent_img WHERE our_agent_id = our_agent_id ORDER BY our_agent_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $our_agent_id = $row['our_agent_id'];
                    $our_agent_image = $row['our_agent_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/our_agent_images/<?php echo  $our_agent_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End our_agent-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->