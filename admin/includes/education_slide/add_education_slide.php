<?php 
if (isset($_POST['create_education_slide'])) {

	$education_slide_header = $_POST['header'];
	$education_slide_subheader = $_POST['sub_header'];
	$education_slide_category_id = $_POST['education_slide_category'];

	$education_slide_image = $_FILES['image']['name'];
	$education_slide_image_temp = $_FILES['image']['tmp_name'];


	move_uploaded_file($education_slide_image_temp, "../images/education_slides_images/$education_slide_image");

	$query = "INSERT INTO education_slide(education_slide_category_id, education_slide_header, education_slide_subheader, education_slide_image) ";

	$query .="VALUES('{$education_slide_category_id}', '{$education_slide_header}', '{$education_slide_subheader}', '{$education_slide_image}') ";

	$create_education_slide_query = mysqli_query($connection, $query);

	//confirmQuery($create_education_slide_query);

	if (!$create_education_slide_query) {
		die("Query FAILED" . mysqli_error($connection));
	} else {
		echo "<h5 style='color:#077647; text-align:center;'><b>Your Slide Details has been Inserted!</b></h5>";
	}
	
	
}

 ?>


<center><h1><b>Add Slide Details</b></h1></center>



	<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Slide Header</label>
				<input type="text" name="header" placeholder="Enter your Slide header" class="form-control" required>	
			</div>

		</div>

			<div class="col-sm-12">
			<div class="form-group">
				<label for="title">Slide Content</label>
				<textarea class="form-control" name="sub_header" placeholder="Enter your Slide Contents" cols="30" rows="10" required></textarea>	
			</div>
			</div>


	<div class="col-sm-6">



	<div class="form-group">
				<label for="title">Slide Category</label>

				<select name="education_slide_category" id="" class="form-control" >
	<?php 				

	$query = "SELECT * FROM categories ";
	$select_categories = mysqli_query($connection, $query);

	if ($select_categories) {
		echo "Your education_slide has been updated!";
	}else
	{
		die("QUERY FAILED" . mysqli_error($connection));
	}

	while ($row = mysqli_fetch_assoc($select_categories)) {
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];

	echo "<option value='$cat_id'>{$cat_title}</option>";

	}

	?>

				</select>

	</div>







			
		</div>







<div class="col-sm-6">


			<div class="form-group">
				

				<label for="image">Upload Slide Image  <b style="color:red;">** Image size should be 570*347 pixel for best view!</b></label>
				<input class="form-control" placeholder="Upload Image" type="file" name="image" class="form-control" required>	
			</div>
			

</br>

			</div>
			</br></br></br>
			<center>
			<div class="form-group">
				<input type="submit" name="create_education_slide" value="Publish" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="education_slides.php">View All Slides</a></button>
			</div>
			</center>
		

		</form>
	</form>
