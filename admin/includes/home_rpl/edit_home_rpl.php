<?php 

	if (isset($_GET['p_id'])) {

    	$the_home_rpl_id = $_GET['p_id'];
    }

	$query = "SELECT * FROM home_rpl WHERE home_rpl_id= $the_home_rpl_id "; //query for showing post.
    $the_posts_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_posts_id)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_header = $row['home_rpl_header'];
    $home_rpl_subheader = $row['home_rpl_subheader'];
    $home_rpl_image = $row['home_rpl_image'];



}

	if (isset($_POST['update_rpl'])) {
		
		$home_rpl_header = $_POST['header'];
		$home_rpl_subheader = $_POST['sub_header'];
		$home_rpl_image = $_FILES['image']['name'];
		$home_rpl_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $our_agent_top_img = $time.'_'.$our_agent_top_img;

		move_uploaded_file($home_rpl_temp, "../images/home_rpl/$home_rpl_image");

				if (empty($home_rpl_image)) {
			
			$query = "SELECT * FROM home_rpl WHERE home_rpl_id = $the_home_rpl_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$home_rpl_image = $row['home_rpl_image'];
			}
		}

		$query = "UPDATE home_rpl SET ";
		$query.= "home_rpl_header = '{$home_rpl_header}', ";
		$query.= "home_rpl_subheader = '{$home_rpl_subheader}', ";
		$query.= "home_rpl_image = '{$home_rpl_image}' ";
		$query.= "WHERE home_rpl_id = {$the_home_rpl_id} ";

		$update_post = mysqli_query($connection,$query);

		if (! $update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Rpl Home Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update RPL Home</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit RPL Name</label>
				<input type="text" name="header" value="<?php echo $home_rpl_header; ?>" disable class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-group">
				<label for="sub_header">Edit RPL Content</label>
				<input type="text" name="sub_header" value="<?php echo $home_rpl_subheader; ?>" class="form-control">	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 570*260</b></label>
				<center><img src="../images/home_rpl/<?php echo $home_rpl_image; ?>" alt="" width="30%"></center>
				<input type="file" name="image" class="form-control">	
			</div>
</div>

		

						<center>
			<div class="form-group">
				<input type="submit" name="update_rpl" value="Update" class="btn btn-danger">
				<button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="home_rpl.php">View All Home RPL</a></button>
			</div>
			</center>
	</form>