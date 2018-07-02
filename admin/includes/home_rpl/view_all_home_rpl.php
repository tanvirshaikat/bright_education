

<table id="example" class="display table table-bordered table-hover" cellspacing="0" width="100%">
                        
                            <thead>
                                <tr>
                                    <th>RPL ID</th>
                                    <th>RPL Name</th>
                                    <th>RPL Content</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                                <tfoot>
                                    <tr>
                                    <th>RPL ID</th>
                                    <th>RPL Name</th>
                                    <th>RPL Content</th>
                                    <th>Edit</th>
                                    </tr>
                                </tfoot>
                            <tbody>
                                

<?php 

    $query = "SELECT * FROM home_rpl"; //query for showing home_rpl.
    $select_home_rpl = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_home_rpl)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_header = $row['home_rpl_header'];
    $home_rpl_subheader = $row['home_rpl_subheader'];
    $home_rpl_image = $row['home_rpl_image'];



    echo "<tr>";
    
    echo "<td>$home_rpl_id</td>";
    echo "<td>$home_rpl_header</td>";
    echo "<td>$home_rpl_subheader</td>";
    echo "<td><img src='../images/home_rpl/$home_rpl_image'  width='100'></td>";





    //echo "<td>$home_rpl_status</td>";
    
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='home_rpl.php?source=edit_home_rpl&p_id={$home_rpl_id}'>Edit</button></a></center></td>";


    echo "</tr>";

}

 ?>


                            </tbody>
                        </table>