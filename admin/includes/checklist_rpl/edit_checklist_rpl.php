<?php 



    $the_checklist_rpl_id = 1;
  

	$query = "SELECT * FROM checklist_rpl WHERE checklist_rpl_id= $the_checklist_rpl_id "; //query for showing post.
    $the_checklist_rpl_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_checklist_rpl_edit_id)) {
    $checklist_rpl_id = $row['checklist_rpl_id'];
    $checklist_rpl_header = $row['checklist_rpl_header'];
    $checklist_rpl_content = $row['checklist_rpl_content'];
    //$checklist_rpl_category_id = $row['checklist_rpl_category_id'];
    $checklist_rpl_top_img = $row['checklist_rpl_top_img'];



}

	if (isset($_POST['update'])) {
		
		$checklist_rpl_header = $_POST['header'];
		$checklist_rpl_content = $_POST['content'];
		//$checklist_rpl_category_id = $_POST['checklist_rpl_category'];
		$checklist_rpl_top_img = $_FILES['image']['name'];
		$checklist_rpl_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $checklist_rpl_top_img = $time.'_'.$checklist_rpl_top_img;

		move_uploaded_file($checklist_rpl_top_img_temp, "../images/checklist_rpl_images/$checklist_rpl_top_img");



		if (empty($checklist_rpl_top_img)) {
			
			$query = "SELECT * FROM checklist_rpl WHERE checklist_rpl_id = $the_checklist_rpl_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$checklist_rpl_top_img = $row['checklist_rpl_top_img'];
			}
		}


		$query = "UPDATE checklist_rpl SET ";
		$query.= "checklist_rpl_header = '{$checklist_rpl_header}', ";
		$query.= "checklist_rpl_content = '{$checklist_rpl_content}', ";
		$query.= "checklist_rpl_top_img = '{$checklist_rpl_top_img}' ";
		$query.= "WHERE checklist_rpl_id = {$the_checklist_rpl_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Checklist RPL Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit checklist_rpl Header</label>
				<input type="text" name="header" value="<?php echo $checklist_rpl_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit checklist_rpl Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $checklist_rpl_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/checklist_rpl_images/<?php echo $checklist_rpl_top_img; ?>" alt="" width="90%"></center>
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