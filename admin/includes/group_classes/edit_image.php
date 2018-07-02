<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM group_classes_img WHERE group_classes_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $group_classes_id = $row['group_classes_id'];
    $group_classes_image = $row['group_classes_image'];


}

	if (isset($_POST['update_image'])) {

		$group_classes_image = $_FILES['image']['name'];
		$group_classes_image_temp = $_FILES['image']['tmp_name'];


		move_uploaded_file($group_classes_image_temp, "../images/group_classes_images/$group_classes_image");

		if (empty($group_classes_image)) {
			
			$query = "SELECT * FROM group_classes_img WHERE group_classes_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$group_classes_image = $row['group_classes_image'];
			}
		}

		$query = "UPDATE group_classes_img SET ";
		$query.= "group_classes_image = '{$group_classes_image}' ";
		$query.= "WHERE group_classes_id = {$the_post_id} ";

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

				<img src="../images/group_classes_images/<?php echo $group_classes_image; ?>" alt="" width="50%">
				<input type="file" name="image" class="form-control">	
			</div>

			</br>
			
			<div class="form-group">
				<input type="submit" name="update_image" value="UPDATE" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="group_classes_case.php?source=view_group_classes_img">View All checklist Rpl Images</a></button>
			</div>
			</center>
		</div>
	</form>