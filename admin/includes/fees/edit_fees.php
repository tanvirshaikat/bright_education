<?php 



    $the_fees_id = 1;
  

	$query = "SELECT * FROM fees WHERE fees_id= $the_fees_id "; //query for showing post.
    $the_fees_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_fees_edit_id)) {
    $fees_id = $row['fees_id'];
    $fees_header = $row['fees_header'];
    $fees_content = $row['fees_content'];
    //$fees_category_id = $row['fees_category_id'];
    $fees_top_img = $row['fees_top_img'];



}

	if (isset($_POST['update'])) {
		
		$fees_header = $_POST['header'];
		$fees_content = $_POST['content'];
		//$fees_category_id = $_POST['fees_category'];
		$fees_top_img = $_FILES['image']['name'];
		$fees_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $fees_top_img = $time.'_'.$fees_top_img;

		move_uploaded_file($fees_top_img_temp, "../images/fees_images/$fees_top_img");



		if (empty($fees_top_img)) {
			
			$query = "SELECT * FROM fees WHERE fees_id = $the_fees_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$fees_top_img = $row['fees_top_img'];
			}
		}


		$query = "UPDATE fees SET ";
		$query.= "fees_header = '{$fees_header}', ";
		$query.= "fees_content = '{$fees_content}', ";
		$query.= "fees_top_img = '{$fees_top_img}' ";
		$query.= "WHERE fees_id = {$the_fees_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Fees Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit fees Header</label>
				<input type="text" name="header" value="<?php echo $fees_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit fees Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $fees_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/fees_images/<?php echo $fees_top_img; ?>" alt="" width="90%"></center>
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