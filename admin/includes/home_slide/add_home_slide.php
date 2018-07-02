<?php 
if (isset($_POST['create_home_slide'])) {

	$home_slide_header = $_POST['header'];
	$home_slide_subheader = $_POST['sub_header'];
	$home_slide_category_id = $_POST['home_slide_category'];

	$home_slide_image = $_FILES['image']['name'];
	$home_slide_image_temp = $_FILES['image']['tmp_name'];


	move_uploaded_file($home_slide_image_temp, "../images/home_slides_images/$home_slide_image");

	$query = "INSERT INTO home_slide(home_slide_category_id, home_slide_header, home_slide_subheader, home_slide_image) ";

	$query .="VALUES('{$home_slide_category_id}', '{$home_slide_header}', '{$home_slide_subheader}', '{$home_slide_image}') ";

	$create_home_slide_query = mysqli_query($connection, $query);

	//confirmQuery($create_home_slide_query);

	if (!$create_home_slide_query) {
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
				<input type="text" name="header" placeholder="Enter your Slide header" class="form-control" >	
			</div>

		</div>


		<div class="col-sm-12">
			<div class="form-group">
				<label for="sub_header">Slide Sub Header</label>
				<input type="text" name="sub_header" placeholder="Enter Sub Header" class="form-control" >	
			</div>
		</div>

	<div class="col-sm-6">



	<div class="form-group">
				<label for="title">Slide Category</label>

				<select name="home_slide_category" id="" class="form-control" >
	<?php 				

	$query = "SELECT * FROM categories ";
	$select_categories = mysqli_query($connection, $query);

	if ($select_categories) {
		echo "Your home_slide has been updated!";
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
				

				<label for="image">Upload Slide Image  <b style="color:red;">** Image size should be 2000*550 pixel for best view!</b></label>
				<input class="form-control input-lg" placeholder="Upload Image" type="file" name="image" class="form-control" required>	
			</div>
			

</br>

			</div>
			</br></br></br>
			<center>
			<div class="form-group">
				<input type="submit" name="create_home_slide" value="Publish" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="home_slides.php">View All Slides</a></button>
			</div>
			</center>
		

		</form>
	</form>
