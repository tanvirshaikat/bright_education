<div class="form-group">
 <button class="btn btn-danger" ><a style="color:#fff; text-decoration:none;" href="education_slides.php?source=add_education_slide">+ Add education Slide</a></button>
</div>

<table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                        
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Slide Category</th>
                                    <th>Slide Header</th>
                                    <th>Slide content</th>
                                    <th>Slide Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                                <tfoot>
                                    <tr>
                                    <th>Id</th>
                                    <th>Slide Category</th>
                                    <th>Slide Header</th>
                                    <th>Slide content</th>
                                    <th>Slide Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </tr>
                                </tfoot>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM education_slide "; //query for showing education_slide.
    $select_education_slide = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_education_slide)) {
    $education_slide_id = $row['education_slide_id'];
    $education_slide_header = $row['education_slide_header'];
    $education_slide_subheader = $row['education_slide_subheader'];
    $education_slide_category_id = $row['education_slide_category_id'];
    //$education_slide_status = $row['education_slide_status'];
    $education_slide_image = $row['education_slide_image'];


    echo "<tr>";
    echo "<td>$education_slide_id</td>";

    $query = "SELECT * FROM categories WHERE cat_id= {$education_slide_category_id} "; //edit categories id.
    $select_categories_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<td>{$cat_title}</td>";
    }

    echo "<td>$education_slide_header</td>";
    echo "<td>$education_slide_subheader</td>";
    echo "<td><img width='100' src='../images/education_slides_images/$education_slide_image' ></td>";




    //echo "<td>$education_slide_status</td>";
    
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='education_slides.php?source=edit_education_slide&p_id={$education_slide_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='education_slides.php?delete={$education_slide_id}'>Delete</a></center></td>";

    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>
<?php 

    if (isset($_GET['delete'])) {
        $the_education_slide_id = $_GET['delete'];
        $query = "DELETE FROM education_slide WHERE education_slide_id = {$the_education_slide_id} ";
        $delete_query = mysqli_query($connection, $query);
        echo "<script> window.location='education_slides.php'; </script>";
    }

 ?>