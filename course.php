<?php include "includes/header.php" ?>

<?php include "includes/header_navigation.php" ?>
<main>
<?php 

if (isset($_GET['course'])) {
$details_course_id =  $_GET['course'];
}    

$query = "SELECT * FROM course WHERE course_id = $details_course_id limit 1";
$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $course_id = $row['course_id'];
    $course_title = $row['course_title'];
        

    ?>

<section class="ahnav">
<div class="container">
<div class="row">
    <p> <a href="index"><i class="fa fa-home"></i></a> / <a href="rpl">Choose Your Course</a> / <a href=""><?php echo $course_title; ?></a> </p>
</div>
</div>
</section>

<?php } ?>

 <section style="margin-top:20px">
 <div class="container">
      <div class="">
      
      
          <table class="table table-hover table-striped table-bordered table-responsive">
          
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Certificate Name</th>
                                                    <!-- <th>Subject</th> -->
                                                    <th>Code</th>
                                                    <th>Apply</th>
                                                </tr>
                                            </thead>
                                            
                                            
                                            <tbody> 


<?php 

if (isset($_GET['course'])) {
$details_course_id =  $_GET['course'];
}    

$query = "SELECT * FROM details WHERE details_course_id = $details_course_id ";
$select_all_posts_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
    $details_id = $row['details_id'];
    $details_certificate = $row['details_certificate'];
    $details_subject = $row['details_subject'];
    $details_code = $row['details_code'];
        

    ?>


<tr>
    <td><?php echo $details_certificate; ?></td>
    <!-- <td><?php echo $details_subject; ?></td> -->
    <td><?php echo $details_code; ?></td>
    <!-- <td><a href="apply.php?p_id=<?php echo $details_id; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>Apply Now</a></td> -->
    <td><a href="apply"><i class="fa fa-info-circle" aria-hidden="true"></i> Apply Now</a></td>
</tr>


                    
                    <?php    } ?>
    </tbody>
    
    
</table> 




      </div>
  </div>
  
 
 </section>
  
  </main>
  

<?php include "includes/footer.php" ?>