  <div class="col-md-6">

<?php 
if (isset($_POST['create_post'])) {

    $checklist_rpl_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


    move_uploaded_file($post_image_temp, "../images/checklist_rpl_images/$checklist_rpl_image");

    $query = "INSERT INTO checklist_rpl_img(checklist_rpl_image) ";

    $query .="VALUES('{$checklist_rpl_image}') ";

    $create_post_query = mysqli_query($connection, $query);

    //confirmQuery($create_post_query);

    if (!$create_post_query) {
        die("Query FAILED" . mysqli_error($connection));
    } else {
        echo "<h5 style='color:#077647; text-align:center;'><b>Your Image has been uploaded!</b></h5>";
    }
    
    
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
<center>
<div class="form-group">
<span style="color:red;"><h5><b> <q> Better display of image is 570*350 pixel</q></b></h5></span>
                <label for="title">Upload Checklist RPL Content Image</label>
                <input type="file" name="image" class="form-control" required>   
            </div>
            <center>
            <div class="form-group">
                <input type="submit" name="create_post" value="Upload" class="btn btn-danger">
            </div>
            </center>
      
    </form>

  </div>


 <div class="col-md-6">

                        <table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM checklist_rpl_img"; //query for showing post.
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $checklist_rpl_id = $row['checklist_rpl_id'];

    $checklist_rpl_image = $row['checklist_rpl_image'];


    echo "<tr>";
    echo "<td>$checklist_rpl_id</td>";


    $query = "SELECT * FROM checklist_rpl_img WHERE checklist_rpl_id= {$checklist_rpl_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $checklist_rpl_id = $row['checklist_rpl_id'];
    $checklist_rpl_image = $row['checklist_rpl_image'];


    }


    echo "<td><img width='100' src='../images/checklist_rpl_images/$checklist_rpl_image' ></td>";

    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='checklist_rpl_case.php?source=edit_checklist_rpl_img&p_id={$checklist_rpl_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='checklist_rpl_case.php?delete={$checklist_rpl_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

	if (isset($_GET['delete'])) {
		$the_checklist_rpl_id = $_GET['delete'];
		$query = "DELETE FROM checklist_rpl_img WHERE checklist_rpl_id = {$the_checklist_rpl_id} ";
		$delete_query = mysqli_query($connection, $query);
		echo "<script> window.location='checklist_rpl_case.php?source=view_checklist_rpl_img'; </script>";
	}

 ?>
 </div>