<?php 



    $the_flexible_time_id = 1;
  

	$query = "SELECT * FROM flexible_time WHERE flexible_time_id= $the_flexible_time_id "; //query for showing post.
    $the_flexible_time_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_flexible_time_edit_id)) {
    $flexible_time_id = $row['flexible_time_id'];
    $flexible_time_header = $row['flexible_time_header'];
    $flexible_time_content = $row['flexible_time_content'];
    //$flexible_time_category_id = $row['flexible_time_category_id'];
    $flexible_time_top_img = $row['flexible_time_top_img'];



}

	if (isset($_POST['update'])) {
		
		$flexible_time_header = $_POST['header'];
		$flexible_time_content = $_POST['content'];
		//$flexible_time_category_id = $_POST['flexible_time_category'];
		$flexible_time_top_img = $_FILES['image']['name'];
		$flexible_time_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $flexible_time_top_img = $time.'_'.$flexible_time_top_img;

		move_uploaded_file($flexible_time_top_img_temp, "../images/flexible_time_images/$flexible_time_top_img");



		if (empty($flexible_time_top_img)) {
			
			$query = "SELECT * FROM flexible_time WHERE flexible_time_id = $the_flexible_time_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$flexible_time_top_img = $row['flexible_time_top_img'];
			}
		}


		$query = "UPDATE flexible_time SET ";
		$query.= "flexible_time_header = '{$flexible_time_header}', ";
		$query.= "flexible_time_content = '{$flexible_time_content}', ";
		$query.= "flexible_time_top_img = '{$flexible_time_top_img}' ";
		$query.= "WHERE flexible_time_id = {$the_flexible_time_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Flexible Time Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit flexible_time Header</label>
				<input type="text" name="header" value="<?php echo $flexible_time_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit flexible_time Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $flexible_time_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/flexible_time_images/<?php echo $flexible_time_top_img; ?>" alt="" width="90%"></center>
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