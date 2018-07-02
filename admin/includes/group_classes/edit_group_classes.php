<?php 



    $the_group_classes_id = 1;
  

	$query = "SELECT * FROM group_classes WHERE group_classes_id= $the_group_classes_id "; //query for showing post.
    $the_group_classes_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_group_classes_edit_id)) {
    $group_classes_id = $row['group_classes_id'];
    $group_classes_header = $row['group_classes_header'];
    $group_classes_content = $row['group_classes_content'];
    //$group_classes_category_id = $row['group_classes_category_id'];
    $group_classes_top_img = $row['group_classes_top_img'];



}

	if (isset($_POST['update'])) {
		
		$group_classes_header = $_POST['header'];
		$group_classes_content = $_POST['content'];
		//$group_classes_category_id = $_POST['group_classes_category'];
		$group_classes_top_img = $_FILES['image']['name'];
		$group_classes_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $group_classes_top_img = $time.'_'.$group_classes_top_img;

		move_uploaded_file($group_classes_top_img_temp, "../images/group_classes_images/$group_classes_top_img");



		if (empty($group_classes_top_img)) {
			
			$query = "SELECT * FROM group_classes WHERE group_classes_id = $the_group_classes_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$group_classes_top_img = $row['group_classes_top_img'];
			}
		}


		$query = "UPDATE group_classes SET ";
		$query.= "group_classes_header = '{$group_classes_header}', ";
		$query.= "group_classes_content = '{$group_classes_content}', ";
		$query.= "group_classes_top_img = '{$group_classes_top_img}' ";
		$query.= "WHERE group_classes_id = {$the_group_classes_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Small Group Classes Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit group_classes Header</label>
				<input type="text" name="header" value="<?php echo $group_classes_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit group_classes Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $group_classes_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/group_classes_images/<?php echo $group_classes_top_img; ?>" alt="" width="90%"></center>
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