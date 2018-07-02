<?php 
  

            $query = "SELECT * FROM home_slide WHERE home_slide_id = home_slide_id ORDER BY home_slide_id DESC LIMIT 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $home_slide_id = $row['home_slide_id'];
                    $home_slide_header = $row['home_slide_header'];
                    $home_slide_category_id = $row['home_slide_category_id'];
                    $home_slide_subheader = $row['home_slide_subheader'];
                    //$home_slide_header = $row['home_slide_header'];
                    $home_slide_image = $row['home_slide_image'];
                        

                    ?>




                    <div class="item active">
                        <img src="images/home_slides_images/<?php echo  $home_slide_image ; ?>" alt="Chania" width="100%">
                        <div class="carousel-caption">
                            <h3><?php echo  $home_slide_header ; ?></h3>
                            <p><?php echo  $home_slide_subheader ; ?> </p>


<?php
$query = "SELECT * FROM categories WHERE cat_id= $home_slide_category_id "; //edit categories id.
            $select_categories_id = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_link = $row['cat_link'];

           // echo "<option value='$cat_id'>{$cat_link}</option>";
            echo "<button class='btn btn-default'><a style='color:#fff;' href= '$cat_link'>Read More</a></button>";
            } 

?>


                        </div>
                    </div>
<?php   }   ?>




            






            <?php 

        // if (isset($_GET['home_slide'])) {
        //         $post_home_slide_id =  $_GET['home_slide'];
        //     }    

            $query = "SELECT * FROM home_slide WHERE home_slide_id = home_slide_id  ORDER BY home_slide_id DESC LIMIT 5 OFFSET 1";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $home_slide_id = $row['home_slide_id'];
                    $home_slide_header = $row['home_slide_header'];
                    $home_slide_subheader = $row['home_slide_subheader'];
                    $home_slide_category_id = $row['home_slide_category_id'];
                    $home_slide_image = $row['home_slide_image'];
                        

                    ?>




                    <div class="item">
                        <img src="images/home_slides_images/<?php echo  $home_slide_image ; ?>" alt="Chania" width="100%">
                        <div class="carousel-caption">
                            <h3><?php echo  $home_slide_header ; ?></h3>
                            <p><?php echo  $home_slide_subheader ; ?> </p>



<?php
$query = "SELECT * FROM categories WHERE cat_id= $home_slide_category_id "; //edit categories id.
            $select_categories_id = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_link = $row['cat_link'];

           // echo "<option value='$cat_id'>{$cat_link}</option>";
            echo "<button class='btn btn-default'><a style='color:#fff;' href= '$cat_link'>Read More</a></button>";
            } 

?>

                        </div>
                    </div>

<?php   }   ?>



