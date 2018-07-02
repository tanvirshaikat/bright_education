<?php 



    $the_admission_id = 1;
  

	$query = "SELECT * FROM admission WHERE admission_id= $the_admission_id "; //query for showing post.
    $the_admission_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_admission_edit_id)) {
    $admission_id = $row['admission_id'];
    $admission_header = $row['admission_header'];
    $admission_content = $row['admission_content'];
    //$admission_category_id = $row['admission_category_id'];
    $admission_top_img = $row['admission_top_img'];



}

	if (isset($_POST['update'])) {
		
		$admission_header = $_POST['header'];
		$admission_content = $_POST['content'];
		//$admission_category_id = $_POST['admission_category'];
		$admission_top_img = $_FILES['image']['name'];
		$admission_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $admission_top_img = $time.'_'.$admission_top_img;

		move_uploaded_file($admission_top_img_temp, "../images/admission_images/$admission_top_img");



		if (empty($admission_top_img)) {
			
			$query = "SELECT * FROM admission WHERE admission_id = $the_admission_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$admission_top_img = $row['admission_top_img'];
			}
		}


		$query = "UPDATE admission SET ";
		$query.= "admission_header = '{$admission_header}', ";
		$query.= "admission_content = '{$admission_content}', ";
		$query.= "admission_top_img = '{$admission_top_img}' ";
		$query.= "WHERE admission_id = {$the_admission_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Admission Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit admission Header</label>
				<input type="text" name="header" value="<?php echo $admission_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit admission Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $admission_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/admission_images/<?php echo $admission_top_img; ?>" alt="" width="90%"></center>
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