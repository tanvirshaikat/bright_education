<div class="col-md-6">
    <div id="edu-slider" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="4500">

        <div class="carousel-inner">

<?php 


$query = "SELECT * FROM education_slide WHERE education_slide_id = education_slide_id ORDER BY education_slide_id DESC LIMIT 1";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

        $education_slide_image = $row['education_slide_image'];
            

        ?>

<div class="item active">
    <img src="images/education_slides_images/<?php echo  $education_slide_image ; ?>" alt="">
</div>
<?php   }   ?>




<?php 


$query = "SELECT * FROM education_slide WHERE education_slide_id = education_slide_id ORDER BY education_slide_id DESC LIMIT 2 OFFSET 1 ";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

        $education_slide_image = $row['education_slide_image'];
            

        ?>

            <div class="item">
                <img src="images/education_slides_images/<?php echo  $education_slide_image ; ?>" alt="">
            </div>
<?php   }   ?>


        </div>

        <div class="extra-shadwo"></div>

    </div>
</div>





<div class="col-md-6">
    <div id="educont-slider" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="4500">

        <div class="carousel-inner">
 <?php       
             $query = "SELECT * FROM education_slide WHERE education_slide_id = education_slide_id ORDER BY education_slide_id DESC LIMIT 1 ";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $education_slide_id = $row['education_slide_id'];
                    $education_slide_header = $row['education_slide_header'];
                    $education_slide_subheader = $row['education_slide_subheader'];
                    $education_slide_category_id = $row['education_slide_category_id'];
                    ?>



<div class="item active">
    <h3><?php echo  $education_slide_header ; ?></h3>
    <p>
       <?php echo  $education_slide_subheader ; ?>
    </p>
<?php
$query = "SELECT * FROM categories WHERE cat_id= $education_slide_category_id "; //edit categories id.
            $select_categories_id = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_link = $row['cat_link'];

           // echo "<option value='$cat_id'>{$cat_link}</option>";
            echo "<a href='$cat_link'><button>Read More</button></a>";
            } 

?>
                                            </div>


                                <?php   }   ?>
<?php       
             $query = "SELECT * FROM education_slide WHERE education_slide_id = education_slide_id ORDER BY education_slide_id DESC LIMIT 2 OFFSET 1 ";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $education_slide_id = $row['education_slide_id'];
                    $education_slide_header = $row['education_slide_header'];
                    $education_slide_subheader = $row['education_slide_subheader'];
                    $education_slide_category_id = $row['education_slide_category_id'];
                    ?>



                                            <div class="item">
                                                <h3><?php echo  $education_slide_header ; ?></h3>
                                                <p>
                                                   <?php echo  $education_slide_subheader ; ?>
                                                </p>
<?php
$query = "SELECT * FROM categories WHERE cat_id= $education_slide_category_id "; //edit categories id.
            $select_categories_id = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_link = $row['cat_link'];

           // echo "<option value='$cat_id'>{$cat_link}</option>";
            echo "<a href='$cat_link'><button>Read More</button></a>";
            } 

?>
                                            </div>


                                <?php   }   ?>

                                        </div>
                                    </div>
                                </div>

