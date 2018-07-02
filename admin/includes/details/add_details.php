<?php 
if (isset($_POST['create_details'])) {

	$details_certificate = $_POST['certificate'];
	$details_subject = $_POST['subject'];
	$details_course_id = $_POST['details_course'];

	$details_code = $_POST['code'];

	$query = "INSERT INTO details(details_course_id, details_certificate, details_subject, details_code) ";

	$query .="VALUES('{$details_course_id}', '{$details_certificate}', '{$details_subject}', '{$details_code}') ";

	$create_details_query = mysqli_query($connection, $query);

	//confirmQuery($create_details_query);

	if (!$create_details_query) {
		die("Query FAILED" . mysqli_error($connection));
	} else {
		echo "<h5 style='color:#077647; text-align:center;'><b>Your Course details has been Inserted!</b></h5>";
	}
	
	
}

 ?>


<center><h1><b>Add Course Details</b></h1></center>



	<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="certificate">Certificate Name</label>
				<input type="text" name="certificate" placeholder="Enter your certificate name" class="form-control" required>	
			</div>

		</div>


		<div class="col-sm-12">
			<div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" name="subject" placeholder="Enter Subject name" class="form-control">	
			</div>
		</div>



	<div class="col-sm-6">



	<div class="form-group">
				<label for="title">Select Course</label>

				<select name="details_course" id="" class="form-control" >
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
	<div class="form-group">
		<label for="subject">Code</label>
		<input type="text" name="code" placeholder="Enter Subject Code" class="form-control">	
	</div>
</div>




<br>


<div class="col-sm-12">


			
			</br></br></br>
			<center>
			<div class="form-group">
				<input type="submit" name="create_details" value="Publish" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="details_case.php">View All Course Details</a></button>
			</div>
			</center>
		</div>

		</form>
	</form>
