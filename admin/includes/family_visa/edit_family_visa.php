<?php 



    $the_family_visa_id = 1;
  

	$query = "SELECT * FROM family_visa WHERE family_visa_id= $the_family_visa_id "; //query for showing post.
    $the_family_visa_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_family_visa_edit_id)) {
    $family_visa_id = $row['family_visa_id'];
    $family_visa_header = $row['family_visa_header'];
    $family_visa_content = $row['family_visa_content'];
    //$family_visa_category_id = $row['family_visa_category_id'];
    $family_visa_top_img = $row['family_visa_top_img'];



}

	if (isset($_POST['update'])) {
		
		$family_visa_header = $_POST['header'];
		$family_visa_content = $_POST['content'];
		//$family_visa_category_id = $_POST['family_visa_category'];
		$family_visa_top_img = $_FILES['image']['name'];
		$family_visa_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $family_visa_top_img = $time.'_'.$family_visa_top_img;

		move_uploaded_file($family_visa_top_img_temp, "../images/family_visa_images/$family_visa_top_img");



		if (empty($family_visa_top_img)) {
			
			$query = "SELECT * FROM family_visa WHERE family_visa_id = $the_family_visa_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$family_visa_top_img = $row['family_visa_top_img'];
			}
		}


		$query = "UPDATE family_visa SET ";
		$query.= "family_visa_header = '{$family_visa_header}', ";
		$query.= "family_visa_content = '{$family_visa_content}', ";
		$query.= "family_visa_top_img = '{$family_visa_top_img}' ";
		$query.= "WHERE family_visa_id = {$the_family_visa_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Family Visa Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit family_visa Header</label>
				<input type="text" name="header" value="<?php echo $family_visa_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit family_visa Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $family_visa_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/family_visa_images/<?php echo $family_visa_top_img; ?>" alt="" width="90%"></center>
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