<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM employment_visa_img WHERE employment_visa_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $employment_visa_id = $row['employment_visa_id'];
    $employment_visa_image = $row['employment_visa_image'];


}

	if (isset($_POST['update_image'])) {

		$employment_visa_image = $_FILES['image']['name'];
		$employment_visa_image_temp = $_FILES['image']['tmp_name'];


		move_uploaded_file($employment_visa_image_temp, "../images/employment_visa_images/$employment_visa_image");

		if (empty($employment_visa_image)) {
			
			$query = "SELECT * FROM employment_visa_img WHERE employment_visa_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$employment_visa_image = $row['employment_visa_image'];
			}
		}

		$query = "UPDATE employment_visa_img SET ";
		$query.= "employment_visa_image = '{$employment_visa_image}' ";
		$query.= "WHERE employment_visa_id = {$the_post_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Image has been updated!</b></h5>";
		}
		
	}
    

 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-sm-3">
</div>
		<div class="col-sm-6">
		<center>
			<div class="form-group">
			<span style="color:red;"><h5><b> <q>Better display of image is 570*350 pixel</q></b></h5></span>
				<label for="title">Select Image</label>

				<img src="../images/employment_visa_images/<?php echo $employment_visa_image; ?>" alt="" width="50%">
				<input type="file" name="image" class="form-control">	
			</div>

			</br>
			
			<div class="form-group">
				<input type="submit" name="update_image" value="UPDATE" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="employment_visa_case.php?source=view_employment_visa_img">View All checklist Rpl Images</a></button>
			</div>
			</center>
		</div>
	</form>