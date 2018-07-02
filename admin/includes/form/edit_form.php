<?php 

	if (isset($_GET['p_id'])) {

    	$the_post_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM form WHERE form_id= $the_post_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $form_id = $row['form_id'];
    $form_title = $row['form_title'];
    $form_file = $row['form_file'];


}

	if (isset($_POST['update_form'])) {

		$form_title = $_POST['title'];
		$form_file = $_FILES['file']['name'];
		$form_file_temp = $_FILES['file']['tmp_name'];


		move_uploaded_file($form_file_temp, "../images/form_files/$form_file");

		if (empty($form_file)) {
			
			$query = "SELECT * FROM form WHERE form_id = $the_post_id ";
			$select_file = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_file)) {

				$form_file = $row['form_file'];
			}
		}

		$query = "UPDATE form SET ";
		$query.= "form_title = '{$form_title}', ";
		$query.= "form_file = '{$form_file}' ";
		$query.= "WHERE form_id = {$the_post_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Form Details has been updated!</b></h5>";
		}
		
	}
    

 ?>

<form action="" method="post" enctype="multipart/form-data">

<div class="col-sm-3">
</div>
		<div class="col-sm-6">
		

			<div class="form-group">
                <label for="title">Update form Name</label>
                <input type="text" name="title" value="<?php echo $form_title; ?>" class="form-control">   
			</div>

			<div class="form-group">
			<!-- <span style="color:red;"><h5><b style="color:red;"> <q>Better display of file is 570*350 pixel</q></b></h5></span> -->
				<label for="title">Select file to edit </label>
				<input type="file" name="file" class="form-control">	
			</div>

			</br>
			<center>
			<div class="form-group">
				<input type="submit" name="update_form" value="Update" class="btn btn-danger ">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="form_case.php?source=view_form">View All forms</a></button>
			</div>
			</center>
		</div>
	</form>