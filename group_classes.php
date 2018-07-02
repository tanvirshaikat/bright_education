<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM group_classes WHERE group_classes_id = group_classes_id ORDER BY group_classes_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $group_classes_id = $row['group_classes_id'];
                    $group_classes_header = $row['group_classes_header'];
                    $group_classes_content = $row['group_classes_content'];
                    $group_classes_top_img = $row['group_classes_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/group_classes_images/<?php echo  $group_classes_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--group_classes-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="group_classes">IELTS/PTE</a> / <a href="group_classes">Small Group Classes</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $group_classes_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $group_classes_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM group_classes_img WHERE group_classes_id = group_classes_id ORDER BY group_classes_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $group_classes_id = $row['group_classes_id'];
                    $group_classes_image = $row['group_classes_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/group_classes_images/<?php echo  $group_classes_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End group_classes-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->