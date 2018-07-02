<?php 



    $the_education_provider_id = 1;
  

	$query = "SELECT * FROM education_provider WHERE education_provider_id= $the_education_provider_id "; //query for showing post.
    $the_education_provider_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_education_provider_edit_id)) {
    $education_provider_id = $row['education_provider_id'];
    $education_provider_header = $row['education_provider_header'];
    $education_provider_content = $row['education_provider_content'];
    //$education_provider_category_id = $row['education_provider_category_id'];
    $education_provider_top_img = $row['education_provider_top_img'];



}

	if (isset($_POST['update'])) {
		
		$education_provider_header = $_POST['header'];
		$education_provider_content = $_POST['content'];
		//$education_provider_category_id = $_POST['education_provider_category'];
		$education_provider_top_img = $_FILES['image']['name'];
		$education_provider_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $education_provider_top_img = $time.'_'.$education_provider_top_img;

		move_uploaded_file($education_provider_top_img_temp, "../images/education_provider_images/$education_provider_top_img");



		if (empty($education_provider_top_img)) {
			
			$query = "SELECT * FROM education_provider WHERE education_provider_id = $the_education_provider_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$education_provider_top_img = $row['education_provider_top_img'];
			}
		}


		$query = "UPDATE education_provider SET ";
		$query.= "education_provider_header = '{$education_provider_header}', ";
		$query.= "education_provider_content = '{$education_provider_content}', ";
		$query.= "education_provider_top_img = '{$education_provider_top_img}' ";
		$query.= "WHERE education_provider_id = {$the_education_provider_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Education Provider Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit education_provider Header</label>
				<input type="text" name="header" value="<?php echo $education_provider_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit education_provider Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $education_provider_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/education_provider_images/<?php echo $education_provider_top_img; ?>" alt="" width="90%"></center>
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