<?php 
if (isset($_POST['create_post'])) {

	$post_title = $_POST['title'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	//$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('h:i:s a, d-m-Y');

	move_uploaded_file($post_image_temp, "../images/promotion/$post_image");

	$query = "INSERT INTO posts(post_title, post_date, post_image, post_content,  post_status) ";

	$query .="VALUES('{$post_title}', now(), '{$post_image}', '{$post_content}', '{$post_status}') ";

	$create_post_query = mysqli_query($connection, $query);

	//confirmQuery($create_post_query);

	if (!$create_post_query) {
		die("Query FAILED" . mysqli_error($connection));
	} else {
		echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been Inserted!</b></h5>";
	}
	
	
}

 ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="title">Add Promotion Header</label>
				<input type="text" name="title" placeholder="Enter Your Promotion Header" class="form-control" required>	
			</div>

		</div>


	<div class="col-sm-6">	
			<div class="form-group">
				<label for="title">Select Promotion Status</label>

				<select name="post_status" id="" class="form-control" >

				<option value="published">Select</option>
				<option value="draft">draft</option>
				<option value="published">published</option>

				</select>

			</div>
	</div>


	<div class="col-sm-12">

			<div class="form-group">
				<label for="title">Add Promotion Content</label>
				<textarea class="ckeditor" name="post_content" placeholder="Enter your Promotion Contents" class="form-control" cols="30" rows="10" required></textarea>	
			</div>

	</div>



<div class="col-sm-12">


			<div class="form-group">
				
				<span style="color:red;"><h5><b> <q> Image size should be 810*500 pixel for best view!</q></b></h5></span>
				<label for="title">Add Promotion Image</label>
				<input type="file" name="image" class="form-control" required>	
			</div>

</div>

			</br></br></br>
			<center>
			<div class="form-group">
				<input type="submit" name="create_post" value="Publish" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="promotion.php">View All Promotion</a></button>
			</div>
			</center>
		

		</form>
	</form>
