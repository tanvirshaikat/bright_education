  <div class="col-md-6">

<?php 
if (isset($_POST['create_post'])) {

    $form_title = $_POST['title'];
    $form_file = $_FILES['file']['name'];
    $post_file_temp = $_FILES['file']['tmp_name'];


    move_uploaded_file($post_file_temp, "../images/form_files/$form_file");

    $query = "INSERT INTO form(form_title, form_file) ";

    $query .="VALUES('{$form_title}', '{$form_file}') ";



    $create_form_query = mysqli_query($connection, $query);

    //confirmQuery($create_post_query);

    if (!$create_form_query) {
        die("Query FAILED" . mysqli_error($connection));
    } else {
        echo "<h5 style='color:#077647; text-align:center;'><b>Your form details has been Inserted!</b></h5>";
    }
    
    
}

 ?>
<form action="" method="post" enctype="multipart/form-data">
<center>

<div class="form-group">
<!-- <span style="color:red;"><h5><b> <q> Better display of file is 570*350 pixel</q></b></h5></span> -->
                <label for="title">Add Form Name :</label>
                <input type="text" name="title" class="form-control" placeholder="Write form Name Here" required>   
</div>

<div class="form-group">

                <label for="title">Upload file :<span style="color:red;"></span></label>
                <input type="file" name="file" class="form-control" required>   
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
                                    <th>Forms</th>
                                    <!-- <th>Files</th> -->
                                    <th>Update</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM form"; //query for showing post.
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $form_id = $row['form_id'];
    $form_title = $row['form_title'];

    $form_file = $row['form_file'];


    echo "<tr>";
    echo "<td>$form_id</td>";
    echo "<td>$form_title</td>";


    $query = "SELECT * FROM form WHERE form_id= {$form_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $form_id = $row['form_id'];
    $form_title = $row['form_title'];
    $form_file = $row['form_file'];


    }

    // echo "<td><embed src='../images/form_files/$form_file' width='200px' height='100px' /></td>";

    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='form_case.php?source=edit_form&p_id={$form_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='form_case.php?delete={$form_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
 
 <?php 

	if (isset($_GET['delete'])) {
		$the_form_id = $_GET['delete'];	
        $query = "SELECT * FROM form WHERE form_id = {$the_form_id}";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          $form_id = $row['form_id'];
          $form_file = $row['form_file'];
    
        $file = "../images/form_files/$form_file";
            if (!unlink($file))
            {
            echo ("Error deleting $file");
            }
            else
            {
            echo ("Deleted $file");
            }
		


        $query = "DELETE FROM form WHERE form_id = {$the_form_id} ";
        $delete_query = mysqli_query($connection, $query);

        echo "<script> window.location='form_case.php?source=view_form'; </script>";
    }
}

 ?>
 
 
 
 
 
 
 
 
 
 
 
 </div>