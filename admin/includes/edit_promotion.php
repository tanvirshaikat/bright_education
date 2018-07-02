<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM posts WHERE post_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_date = $row['post_date'];

}

	if (isset($_POST['update_post'])) {
		
		$post_title = $_POST['post_title'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_content = $_POST['post_content'];

		move_uploaded_file($post_image_temp, "../images/promotion/$post_image");

		if (empty($post_image)) {
			
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_image)) {
				
				$post_image = $row['post_image'];
			}
		}

		$query = "UPDATE posts SET ";
		$query.= "post_title = '{$post_title}', ";
		$query.= "post_status = '{$post_status}', ";
		$query.= "post_content = '{$post_content}', ";
		$query.= "post_image = '{$post_image}' ";
		$query.= "WHERE post_id = {$the_post_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="title">Edit Promotion Header</label>
				<input type="text" name="post_title" value="<?php echo $post_title; ?>" class="form-control" >	
			</div>
		</div>
<div class="col-sm-6">
<div class="form-group">
<label for="title">Edit Promotion Status</label>

<select name="post_status" id="" class="form-control">

<option value="published"><?php echo $post_status; ?></option>

<?php 

if ($post_status == 'draft') {
	 
	 echo "<option value='published'>published</option>";

}
else{
	echo "<option value='draft'>draft</option>";
}

 ?>

				
</select>

</div>
</div>


		<div class="col-sm-12">
			<div class="form-group">
				<label for="title">Edit Promotion Content</label>
				<textarea class="ckeditor" name="post_content"  class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>	
			</div>
		</div>




<div class="col-sm-12">

			<div class="form-group">
				
				<span style="color:red;"><h5><b> <q> Image size should be 810*500 pixel for best view!</q></b></h5></span>
				<label for="title">Edit Promotion Image</label>
				<img src="../images/promotion/<?php echo $post_image; ?>" alt="" width="100">
				<input type="file" name="image" class="form-control">	
			</div>



			</br>


		</div>

						<center>
			<div class="form-group">
				<input type="submit" name="update_post" value="Update" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="promotion.php">View All Posts</a></button>
			</div>
			</center>
	</form>