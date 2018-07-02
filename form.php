<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>

        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 1";
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

        <!--About-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="#"><i class="fa fa-home"></i></a> / <a href="">Download Form</a> </p>
                    </div>
                </div>
            </section>

            <section>
            	<div class="container"  style="background:#fff;margin-top:25px">
            	  <div class="row">

<?php 

$query = "SELECT * FROM form order by form_id DESC";
$select_form = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_form)) {

$form_id = $row['form_id'];
$form_title = $row['form_title'];
$form_file = $row['form_file'];

?>

                    <div class="col-md-3">
                       <div style="border: 1px solid #c6a12f;text-align: center;border-radius: 4px;margin: 15px 0px;">
                        <span style="font-size:8em"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span><br>
                        <a href="images/form_files/<?php echo $form_file ?>" target="_blank"><button class="btn btn-success btn-sm">Download</button></a>
                        <p><?php echo $form_title ?></p>
                       </div>
                    </div>




 <?php } ?>

            	</div>
            </section>
            
            
            
            
        </main>
        <!--End About-->


<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->