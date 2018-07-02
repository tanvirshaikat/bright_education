<?php 



    $the_about_id = 1;
  

	$query = "SELECT * FROM about_us WHERE about_id= $the_about_id "; //query for showing post.
    $the_about_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_about_edit_id)) {
    $about_id = $row['about_id'];
    $about_header = $row['about_header'];
    $about_content = $row['about_content'];
    //$about_category_id = $row['about_category_id'];
    $about_top_img = $row['about_top_img'];


}

	if (isset($_POST['update'])) {
		
		$about_header = $_POST['header'];
		$about_content = $_POST['content'];
		//$about_category_id = $_POST['about_category'];

		$about_top_img = $_FILES['image']['name'];
		$about_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $about_top_img = $time.'_'.$about_top_img;

		move_uploaded_file($about_top_img_temp, "../images/about_images/$about_top_img");



		if (empty($about_top_img)) {
			
			$query = "SELECT * FROM about_us WHERE about_id = $the_about_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$about_top_img = $row['about_top_img'];
			}
		}


		$query = "UPDATE about_us SET ";
		$query.= "about_header = '{$about_header}', ";
		$query.= "about_content = '{$about_content}', ";
		$query.= "about_top_img = '{$about_top_img}' ";
		$query.= "WHERE about_id = {$the_about_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "Your info has been updated!";
		}
		
	}
    

 ?>
 <center><h1><b>Update About Details</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit About Header</label>
				<input type="text" name="header" value="<?php echo $about_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit About Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $about_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/about_images/<?php echo $about_top_img; ?>" alt="" width="90%"></center>
				<input type="file" name="image" class="form-control">	
			</div>

</div>

</center>
						<center>
			<div class="form-group">
				<input type="submit" name="update" value="Update" class="btn btn-danger">
			</div>
			</center>
	</form>