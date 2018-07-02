<?php 



    $the_bench_mark_id = 1;
  

	$query = "SELECT * FROM bench_mark WHERE bench_mark_id= $the_bench_mark_id "; //query for showing post.
    $the_bench_mark_edit_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($the_bench_mark_edit_id)) {
    $bench_mark_id = $row['bench_mark_id'];
    $bench_mark_header = $row['bench_mark_header'];
    $bench_mark_content = $row['bench_mark_content'];
    //$bench_mark_category_id = $row['bench_mark_category_id'];
    $bench_mark_top_img = $row['bench_mark_top_img'];



}

	if (isset($_POST['update'])) {
		
		$bench_mark_header = $_POST['header'];
		$bench_mark_content = $_POST['content'];
		//$bench_mark_category_id = $_POST['bench_mark_category'];
		$bench_mark_top_img = $_FILES['image']['name'];
		$bench_mark_top_img_temp = $_FILES['image']['tmp_name'];

		// $time = time() + sprintf("%06d",(microtime(true) - floor(microtime(true))) * 1000000);

  //       $bench_mark_top_img = $time.'_'.$bench_mark_top_img;

		move_uploaded_file($bench_mark_top_img_temp, "../images/bench_mark_images/$bench_mark_top_img");



		if (empty($bench_mark_top_img)) {
			
			$query = "SELECT * FROM bench_mark WHERE bench_mark_id = $the_bench_mark_id ";
			$select_top_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_array($select_top_image)) {
				
				$bench_mark_top_img = $row['bench_mark_top_img'];
			}
		}


		$query = "UPDATE bench_mark SET ";
		$query.= "bench_mark_header = '{$bench_mark_header}', ";
		$query.= "bench_mark_content = '{$bench_mark_content}', ";
		$query.= "bench_mark_top_img = '{$bench_mark_top_img}' ";
		$query.= "WHERE bench_mark_id = {$the_bench_mark_id} ";

		$update_post = mysqli_query($connection,$query);

		if (!$update_post) {
			die("QUERY FAILED" . mysqli_error($connection));
		} else {
			echo "<h5 style='color:#077647; text-align:center;'><b>Your Info has been updated!</b></h5>";
		}
		
	}
    

 ?>
 <center><h1><b>Update Bench Mark Page</b></h1></center>

<form action="" method="post" enctype="multipart/form-data">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="header">Edit bench_mark Header</label>
				<input type="text" name="header" value="<?php echo $bench_mark_header; ?>" class="form-control" >	
			</div>
		</div>

		<div class="col-sm-12">

			<div class="form-group">
				<label for="content">Edit bench_mark Content</label>
				<textarea class="ckeditor" name="content"  class="form-control" cols="30" rows="10"><?php echo $bench_mark_content; ?></textarea>	
			</div>
		</div>

<center>
<div class="col-sm-12">

			<div class="form-group">
				
				
				<label for="image">Top Image  <b style="color:red;">** 2000*300</b></label>
				<center><img src="../images/bench_mark_images/<?php echo $bench_mark_top_img; ?>" alt="" width="90%"></center>
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