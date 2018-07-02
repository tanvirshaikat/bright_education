<?php 

	if (isset($_GET['p_id'])) {

    	$the_details_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM details WHERE details_id= $the_details_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $details_id = $row['details_id'];
    $details_certificate = $row['details_certificate'];
    $details_subject = $row['details_subject'];
    $details_course_id = $row['details_course_id'];
    $details_code = $row['details_code'];

}

	if (isset($_POST['update_course'])) {
		
		$details_certificate = $_POST['certificate'];
		$details_subject = $_POST['subject'];
		$details_course_id = $_POST['details_course'];
		$details_code = $_POST['code'];


		$query = "UPDATE details SET ";
		$query.= "details_certificate = '{$details_certificate}', ";
		$query.= "details_course_id = '{$details_course_id}', ";
		$query.= "details_subject = '{$details_subject}', ";
		//$query.= "post_status = '{$post_status}', ";
		$query.= "details_code = '{$details_code}' ";
		$query.= "WHERE details_id = {$the_details_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Course details has been Updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update course Details</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="certificate">Edit course certificate</label>
				<input type="text" name="certificate" value="<?php echo $details_certificate; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-group">
				<label for="subject">Edit course subject</label>
				<input type="text" name="subject" value="<?php echo $details_subject; ?>" class="form-control">	
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
			<label for="title">Edit Courses Name</label>

			<select name="details_course" id="" class="form-control" >

			<?php 


			$query = "SELECT * FROM course WHERE course_id= {$details_course_id} "; //edit course id.
			$select_course_id = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_course_id)) {
			$course_id = $row['course_id'];
			$course_title = $row['course_title'];

			echo "<option value='$course_id'>{$course_title}</option>";
			}

			 ?>

				
			<?php 				

			$query = "SELECT * FROM course ";
			$select_course = mysqli_query($connection, $query);

			if ($select_course) {
			echo "Your details has been updated!";
			}else
			{
			die("QUERY FAILED" . mysqli_error($connection));
			}

			while ($row = mysqli_fetch_assoc($select_course)) {
			$course_id = $row['course_id'];
			$course_title = $row['course_title'];

			echo "<option value='$course_id'>{$course_title}</option>";


			}

			?>
			
			</select>

			</div>


			
		</div>



<div class="col-sm-6">

		<div class="col-sm-12">
			<div class="form-group">
				<label for="code">Edit Code</label>
				<input type="text" name="code" value="<?php echo $details_code; ?>" class="form-control">	
			</div>
		</div>




		</div>

						<center>
			<div class="form-group">
				<input type="submit" name="update_course" value="Update" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="details_case.php">View All Course Details</a></button>
			</div>
			</center>
	</form>