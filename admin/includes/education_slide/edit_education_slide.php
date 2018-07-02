<?php 

	if (isset($_GET['p_id'])) {

    	$the_education_slide_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM education_slide WHERE education_slide_id= $the_education_slide_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $education_slide_id = $row['education_slide_id'];
    $education_slide_header = $row['education_slide_header'];
    $education_slide_subheader = $row['education_slide_subheader'];
    $education_slide_category_id = $row['education_slide_category_id'];
    $education_slide_image = $row['education_slide_image'];

}

	if (isset($_POST['update_slide'])) {
		
		$education_slide_header = $_POST['header'];
		$education_slide_subheader = $_POST['sub_header'];
		$education_slide_category_id = $_POST['education_slide_category'];
		// $post_status = $_POST['post_status'];
		$education_slide_image = $_FILES['image']['name'];
		$education_slide_image_temp = $_FILES['image']['tmp_name'];

		move_uploaded_file($education_slide_image_temp, "../images/education_slides_images/$education_slide_image");

		if (empty($education_slide_image)) {
			
			$query = "SELECT * FROM education_slide WHERE education_slide_id = $the_education_slide_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$education_slide_image = $row['education_slide_image'];
			}
		}

		$query = "UPDATE education_slide SET ";
		$query.= "education_slide_header = '{$education_slide_header}', ";
		$query.= "education_slide_category_id = '{$education_slide_category_id}', ";
		$query.= "education_slide_subheader = '{$education_slide_subheader}', ";
		//$query.= "post_status = '{$post_status}', ";
		$query.= "education_slide_image = '{$education_slide_image}' ";
		$query.= "WHERE education_slide_id = {$the_education_slide_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Slide Details has been Updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Slide Details</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit Slide Header</label>
				<input type="text" name="header" value="<?php echo $education_slide_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-group">
				<label for="title">Slide Content</label>
				<textarea name="sub_header"  class="form-control" cols="30" rows="10"><?php echo $education_slide_subheader; ?></textarea>	
			</div>
		</div>



		<div class="col-sm-6">
			<div class="form-group">
			<label for="title">Edit Slide Category</label>

			<select name="education_slide_category" id="" class="form-control" >

			<?php 


			$query = "SELECT * FROM categories WHERE cat_id= {$education_slide_category_id} "; //edit categories id.
			$select_categories_id = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_categories_id)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			echo "<option value='$cat_id'>{$cat_title}</option>";
			}

			 ?>

				
			<?php 				

			$query = "SELECT * FROM categories ";
			$select_categories = mysqli_query($connection, $query);

			if ($select_categories) {
			echo "Your post has been updated!";
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
				
				
				<label for="image">Update Slide Image  <b style="color:red;">** Image size should be 570*347 pixel for best view!</b></label>
				<img src="../images/education_slides_images/<?php echo $education_slide_image; ?>" alt="" width="100">
				<input type="file" name="image" class="form-control">	
			</div>

<!-- 			<label class="btn btn-default btn-file">
    Browse <input type="file" style="display: none;">
</label> -->



	


		</div>

						<center>
			<div class="form-group">
				<input type="submit" name="update_slide" value="Update" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="education_slides.php">View All Posts</a></button>
			</div>
			</center>
	</form>