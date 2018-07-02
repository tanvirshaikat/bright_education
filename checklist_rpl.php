<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>




<?php   

            $query = "SELECT * FROM checklist_rpl WHERE checklist_rpl_id = checklist_rpl_id ORDER BY checklist_rpl_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $checklist_rpl_id = $row['checklist_rpl_id'];
                    $checklist_rpl_header = $row['checklist_rpl_header'];
                    $checklist_rpl_content = $row['checklist_rpl_content'];
                    $checklist_rpl_top_img = $row['checklist_rpl_top_img'];
                        

                    ?>

        <!--Cover-->
        <section class="acover">
            <img src="images/checklist_rpl_images/<?php echo  $checklist_rpl_top_img ; ?>" alt="">
            <div class="overlay"></div>
        </section>
        <!--End Cover-->

        <!--checklist_rpl-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="what_rpl">RPL</a> / <a href="checklist_rpl">Checklist of RPL</a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $checklist_rpl_header ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $checklist_rpl_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php   

            $query = "SELECT * FROM checklist_rpl_img WHERE checklist_rpl_id = checklist_rpl_id ORDER BY checklist_rpl_id DESC LIMIT 3";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $checklist_rpl_id = $row['checklist_rpl_id'];
                    $checklist_rpl_image = $row['checklist_rpl_image'];
                        
?>

                                    <div class="aimg">
                                        <img src="images/checklist_rpl_images/<?php echo  $checklist_rpl_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--End checklist_rpl-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->