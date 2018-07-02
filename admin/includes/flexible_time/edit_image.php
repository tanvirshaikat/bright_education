<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM flexible_time_img WHERE flexible_time_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $flexible_time_id = $row['flexible_time_id'];
    $flexible_time_image = $row['flexible_time_image'];


}

	if (isset($_POST['update_image'])) {

		$flexible_time_image = $_FILES['image']['name'];
		$flexible_time_image_temp = $_FILES['image']['tmp_name'];


		move_uploaded_file($flexible_time_image_temp, "../images/flexible_time_images/$flexible_time_image");

		if (empty($flexible_time_image)) {
			
			$query = "SELECT * FROM flexible_time_img WHERE flexible_time_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$flexible_time_image = $row['flexible_time_image'];
			}
		}

		$query = "UPDATE flexible_time_img SET ";
		$query.= "flexible_time_image = '{$flexible_time_image}' ";
		$query.= "WHERE flexible_time_id = {$the_post_id} ";

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

				<img src="../images/flexible_time_images/<?php echo $flexible_time_image; ?>" alt="" width="50%">
				<input type="file" name="image" class="form-control">	
			</div>

			</br>
			
			<div class="form-group">
				<input type="submit" name="update_image" value="UPDATE" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="flexible_time_case.php?source=view_flexible_time_img">View All checklist Rpl Images</a></button>
			</div>
			</center>
		</div>
	</form>