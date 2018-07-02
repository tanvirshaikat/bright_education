<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM fees WHERE fees_id = fees_id ORDER BY fees_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $fees_id = $row['fees_id'];
                    $fees_header = $row['fees_header'];
                    $fees_content = $row['fees_content'];
                    $fees_top_img = $row['fees_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/fees_images/<?php echo  $fees_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--fees-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
           <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="group_classes">IELTS/PTE</a> / <a href="fees">Fees</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $fees_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $fees_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM fees_img WHERE fees_id = fees_id ORDER BY fees_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $fees_id = $row['fees_id'];
                    $fees_image = $row['fees_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/fees_images/<?php echo  $fees_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End fees-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->