<div class="form-group">
 <button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="details_case.php?source=add_details">+ Add Subject Details</a></button>
</div>

<table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                        
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Course Name</th>
                                    <th>certificate Name</th>
                                    <th>Subject Name</th>
                                    <th>Subject Code</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                                <tfoot>
                                    <tr>
                                    <th>Id</th>
                                    <th>Course Name</th>
                                    <th>certificate Name</th>
                                    <th>Subject Name</th>
                                    <th>Subject Code</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </tr>
                                </tfoot>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM details "; //query for showing details.
    $select_details = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_details)) {
    $details_id = $row['details_id'];
    $details_certificate = $row['details_certificate'];
    $details_subject = $row['details_subject'];
    $details_course_id = $row['details_course_id'];
    $details_code = $row['details_code'];


    echo "<tr>";
    echo "<td>$details_id</td>";

    $query = "SELECT * FROM course WHERE course_id= {$details_course_id} "; //edit course id.
    $select_course_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_course_id)) {
    $course_id = $row['course_id'];
    $course_title = $row['course_title'];

    echo "<td>{$course_title}</td>";
    }

    echo "<td>$details_certificate</td>";
    echo "<td>$details_subject</td>";
    echo "<td>$details_code</td>";




    //echo "<td>$details_status</td>";
    
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='details_case.php?source=edit_details&p_id={$details_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='details_case.php?delete={$details_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

    if (isset($_GET['delete'])) {
        $the_details_id = $_GET['delete'];
        $query = "DELETE FROM details WHERE details_id = {$the_details_id} ";
        $delete_query = mysqli_query($connection, $query);
        echo "<script> window.location='details_case.php'; </script>";
    }

 ?>