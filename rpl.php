<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>

        <!--Cover-->
<?php   

            $query = "SELECT * FROM top_image WHERE top_image_id = 2";
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


        <!--List RPL-->
        <main>
            <section class="ahnav">
                <div class="container">
                    <div class="row">
                        <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="what_rpl">RPL</a> / <a href="rpl">Choose Your Course</a> </p>
                    </div>
                </div>
            </section>

            <section class="promo">
                <div class="container">
                    <div class="row">

<?php 

$query = "SELECT * FROM course";
$select_courses = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_courses)) {

$course_id = $row['course_id'];
$course_title = $row['course_title'];
$course_image = $row['course_image'];

?>

<!-- echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>"; -->

<div class="col-md-4">
    <div class="row">
        <div class="thumbnail">
            <img src="images/course_images/<?php echo $course_image ?>" alt="" width="100%" height="265px">
            <!-- <a href="#list" data-toggle="modal" > <h3><?php echo $course_title ?> </h3></a> -->
            <a href='course.php?course=<?php echo $course_id ?>'> <h3><?php echo $course_title ?> </h3></a>
            <!-- <a href='category.php?category=$cat_id'>{$cat_title}</a> -->
        </div>
    </div>
</div>


 <?php } ?>

                    </div>
                </div>
            </section>

            <!--MODAL-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div id="list" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">RPL List</h4>
                                    </div>
                                    <div class="modal-body">







<!--                                         <table class="table table-hover table-striped table-bordered table-responsive">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Certificate Name</th>
                                                    <th>Subject</th>
                                                    <th>Code</th>
                                                    <th>Inquiry</th>
                                                </tr>
                                            </thead>
                                            <tbody>   





                                                <tr>
                                                    <td>Certificate III in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>







                                                <tr>
                                                    <td>Certificate IV in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate III in Retail Baking</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate IV in Patisserie</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Diploma of Hospitality</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate III in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate IV in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate III in Retail Baking</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate IV in Patisserie</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Diploma of Hospitality</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate III in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate IV in Commercial Cookery</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate III in Retail Baking</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Certificate IV in Patisserie</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Diploma of Hospitality</td>
                                                    <td>Diploma</td>
                                                    <td>SIT30812</td>
                                                    <td><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> inquiry Now</a></td>
                                                </tr>
                                            </tbody>
                                        </table> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End MODAL-->
        </main>
        <!--End List RPL-->

<!-- Footer -->
<?php include "includes/footer.php" ?>
<!-- Footer -->