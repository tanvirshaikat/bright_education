  <div class="col-md-6">

<?php 
if (isset($_POST['create_post'])) {

    $family_visa_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


    move_uploaded_file($post_image_temp, "../images/family_visa_images/$family_visa_image");

    $query = "INSERT INTO family_visa_img(family_visa_image) ";

    $query .="VALUES('{$family_visa_image}') ";

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
                <label for="title">Upload Family Visa Content Image</label>
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

    $query = "SELECT * FROM family_visa_img"; //query for showing post.
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $family_visa_id = $row['family_visa_id'];

    $family_visa_image = $row['family_visa_image'];


    echo "<tr>";
    echo "<td>$family_visa_id</td>";


    $query = "SELECT * FROM family_visa_img WHERE family_visa_id= {$family_visa_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $family_visa_id = $row['family_visa_id'];
    $family_visa_image = $row['family_visa_image'];


    }


    echo "<td><img width='100' src='../images/family_visa_images/$family_visa_image' ></td>";

    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='family_visa_case.php?source=edit_family_visa_img&p_id={$family_visa_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='family_visa_case.php?delete={$family_visa_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

	if (isset($_GET['delete'])) {
		$the_family_visa_id = $_GET['delete'];
		$query = "DELETE FROM family_visa_img WHERE family_visa_id = {$the_family_visa_id} ";
		$delete_query = mysqli_query($connection, $query);
		echo "<script> window.location='family_visa_case.php?source=view_family_visa_img'; </script>";
	}

 ?>
 </div>