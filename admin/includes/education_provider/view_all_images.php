  <div class="col-md-6">

<?php 
if (isset($_POST['create_post'])) {

    $education_provider_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];


    move_uploaded_file($post_image_temp, "../images/education_provider_images/$education_provider_image");

    $query = "INSERT INTO education_provider_img(education_provider_image) ";

    $query .="VALUES('{$education_provider_image}') ";

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
                <label for="title">Upload Education Provider Content Image</label>
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

    $query = "SELECT * FROM education_provider_img"; //query for showing post.
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $education_provider_id = $row['education_provider_id'];

    $education_provider_image = $row['education_provider_image'];


    echo "<tr>";
    echo "<td>$education_provider_id</td>";


    $query = "SELECT * FROM education_provider_img WHERE education_provider_id= {$education_provider_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $education_provider_id = $row['education_provider_id'];
    $education_provider_image = $row['education_provider_image'];


    }


    echo "<td><img width='100' src='../images/education_provider_images/$education_provider_image' ></td>";

    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='education_provider_case.php?source=edit_education_provider_img&p_id={$education_provider_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='education_provider_case.php?delete={$education_provider_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

	if (isset($_GET['delete'])) {
		$the_education_provider_id = $_GET['delete'];
		$query = "DELETE FROM education_provider_img WHERE education_provider_id = {$the_education_provider_id} ";
		$delete_query = mysqli_query($connection, $query);
		echo "<script> window.location='education_provider_case.php?source=view_education_provider_img'; </script>";
	}

 ?>
 </div>