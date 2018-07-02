<?php include "includes/header.php" ?>

                    <!--MENU-->
                    <?php include "includes/header_navigation.php" ?>
                    <!--//MENU-->





<?php 

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}



$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        //$post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        // $views = $row['views'];




  ?>
        <!--oshc-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index.php"><i class="fa fa-home"></i></a> / <a href="promotion">Promotion</a> / <a href=""><?php echo  $post_title ; ?></a> </p>
                    </div>
                </div>
            </section>

            <section class="acntn">
                <div class="container">
                    <div class="row abg">
                        <div class="col-md-12">
                            <div class="ahed">
                                <h1><?php echo  $post_title ; ?></h1>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">

                                <article class="col-md-7">
                                    <div class="aartcl">
                                        <?php echo  $post_content ; ?>

                                    </div>
                                </article>


<?php   }   ?>

                                <aside class="col-md-5">


<?php 

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}



$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_image = $row['post_image'];





  ?>
                                    <div class="aimg">
                                        <img src="images/promotion/<?php echo  $post_image ; ?>" alt="">
                                    </div>
<?php   }   ?>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

 
<!--footer-->
<?php include "includes/footer.php" ?>
<!--footer-->
