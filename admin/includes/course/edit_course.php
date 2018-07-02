<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM course WHERE course_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $course_id = $row['course_id'];
    $course_title = $row['course_title'];
    $course_image = $row['course_image'];


}

	if (isset($_POST['update_course'])) {

		$course_title = $_POST['title'];
		$course_image = $_FILES['image']['name'];
		$course_image_temp = $_FILES['image']['tmp_name'];


		move_uploaded_file($course_image_temp, "../images/course_images/$course_image");

		if (empty($course_image)) {
			
			$query = "SELECT * FROM course WHERE course_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {

				$course_image = $row['course_image'];
			}
		}

		$query = "UPDATE course SET ";
		$query.= "course_title = '{$course_title}', ";
		$query.= "course_image = '{$course_image}' ";
		$query.= "WHERE course_id = {$the_post_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Course Details has been updated!</b></h5>";
		}
		
	}
    

 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-sm-3">
</div>
		<div class="col-sm-6">
		

			<div class="form-group">
                <label for="title">Update Course Name</label>
                <input type="text" name="title" value="<?php echo $course_title; ?>" class="form-control">   
			</div>

			<div class="form-group">
			<!-- <span style="color:red;"><h5><b style="color:red;"> <q>Better display of image is 570*350 pixel</q></b></h5></span> -->
				<label for="title">Select Image <b style="color:red;"> <q>Better display of image is 570*350 pixel</q></b></label>

				<center><img src="../images/course_images/<?php echo $course_image; ?>" alt="" width="40%"></center>
				<input type="file" name="image" class="form-control">	
			</div>

			</br>
			<center>
			<div class="form-group">
				<input type="submit" name="update_course" value="UPDATE" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="course_case.php?source=view_course">View All Courses</a></button>
			</div>
			</center>
		</div>
	</form>