  <div class="col-md-6">

<?php 
if (isset($_POST['create_post'])) {

    $course_title = $_POST['title'];
    $course_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


    move_uploaded_file($post_image_temp, "../images/course_images/$course_image");

    $query = "INSERT INTO course(course_title, course_image) ";

    $query .="VALUES('{$course_title}', '{$course_image}') ";



    $create_course_query = mysqli_query($connection, $query);

    //confirmQuery($create_post_query);

    if (!$create_course_query) {
        die("Query FAILED" . mysqli_error($connection));
    } else {
        echo "<h5 style='color:#077647; text-align:center;'><b>Your Course details has been updated!</b></h5>";
    }
    
    
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
<center>

<div class="form-group">
<!-- <span style="color:red;"><h5><b> <q> Better display of image is 570*350 pixel</q></b></h5></span> -->
                <label for="title">Insert Course Name :</label>
                <input type="text" name="title" class="form-control" placeholder="Write Course Name Here" required>   
</div>

<div class="form-group">

                <label for="title">Upload Slide Image :<span style="color:red;"><h5><b> <q> Better display of image is 570*350 pixel</q></b></h5></span></label>
                <input type="file" name="image" class="form-control" required>   
            </div>
            <center>
            <div class="form-group">
                <input type="submit" name="create_post" value="Upload" class="btn btn-danger">
            </div>
            </center>
      
    </form>

  </div>


 <div class="col-md-6">

                        <table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Courses</th>
                                    <th>Image</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM course"; //query for showing post.
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $course_id = $row['course_id'];
    $course_title = $row['course_title'];

    $course_image = $row['course_image'];


    echo "<tr>";
    echo "<td>$course_id</td>";
    echo "<td>$course_title</td>";


    $query = "SELECT * FROM course WHERE course_id= {$course_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $course_id = $row['course_id'];
    $course_title = $row['course_title'];
    $course_image = $row['course_image'];


    }


    echo "<td><img width='100' src='../images/course_images/$course_image' ></td>";

    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='course_case.php?source=edit_course&p_id={$course_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='course_case.php?delete={$course_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

	if (isset($_GET['delete'])) {
		$the_course_id = $_GET['delete'];
		$query = "DELETE FROM course WHERE course_id = {$the_course_id} ";
		$delete_query = mysqli_query($connection, $query);
		echo "<script> window.location='course_case.php?source=view_course'; </script>";
	}

 ?>
 </div>