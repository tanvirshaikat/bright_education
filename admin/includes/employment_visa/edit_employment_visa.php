<?php 



    $the_employment_visa_id = 1;
  

	$query = "SELECT * FROM employment_visa WHERE employment_visa_id= $the_employment_visa_id "; //query for showing post.
    $the_employment_visa_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_employment_visa_edit_id)) {
    $employment_visa_id = $row['employment_visa_id'];
    $employment_visa_header = $row['employment_visa_header'];
    $employment_visa_content = $row['employment_visa_content'];
    //$employment_visa_category_id = $row['employment_visa_category_id'];
    $employment_visa_top_img = $row['employment_visa_top_img'];



}

	if (isset($_POST['update'])) {
		
		$employment_visa_header = $_POST['header'];
		$employment_visa_content = $_POST['content'];
		//$employment_visa_category_id = $_POST['employment_visa_category'];
		$employment_visa_top_img = $_FILES['image']['name'];
		$employment_visa_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $employment_visa_top_img = $time.'_'.$employment_visa_top_img;

		move_uploaded_file($employment_visa_top_img_temp, "../images/employment_visa_images/$employment_visa_top_img");



		if (empty($employment_visa_top_img)) {
			
			$query = "SELECT * FROM employment_visa WHERE employment_visa_id = $the_employment_visa_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$employment_visa_top_img = $row['employment_visa_top_img'];
			}
		}


		$query = "UPDATE employment_visa SET ";
		$query.= "employment_visa_header = '{$employment_visa_header}', ";
		$query.= "employment_visa_content = '{$employment_visa_content}', ";
		$query.= "employment_visa_top_img = '{$employment_visa_top_img}' ";
		$query.= "WHERE employment_visa_id = {$the_employment_visa_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Employment Visa Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit employment_visa Header</label>
				<input type="text" name="header" value="<?php echo $employment_visa_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit employment_visa Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $employment_visa_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/employment_visa_images/<?php echo $employment_visa_top_img; ?>" alt="" width="90%"></center>
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