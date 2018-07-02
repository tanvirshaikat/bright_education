<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM about_img WHERE about_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $about_id = $row['about_id'];
    $about_image = $row['about_image'];


}

	if (isset($_POST['update_image'])) {

		$about_image = $_FILES['image']['name'];
		$about_image_temp = $_FILES['image']['tmp_name'];


		move_uploaded_file($about_image_temp, "../images/about_images/$about_image");

		if (empty($about_image)) {
			
			$query = "SELECT * FROM about_img WHERE about_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$about_image = $row['about_image'];
			}
		}

		$query = "UPDATE about_img SET ";
		$query.= "about_image = '{$about_image}' ";
		$query.= "WHERE about_id = {$the_post_id} ";

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

				<img src="../images/about_images/<?php echo $about_image; ?>" alt="" width="50%">
				<input type="file" name="image" class="form-control">	
			</div>

			</br>
			
			<div class="form-group">
				<input type="submit" name="update_image" value="UPDATE" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="pages.php?source=view_about_img">View All About Images</a></button>
			</div>
			</center>
		</div>
	</form>