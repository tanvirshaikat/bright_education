<div class="owl-carousel">


<?php 

    $query = "SELECT * FROM partners_slide order by partners_slide_id DESC";
    $select_partners_slide = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_partners_slide)) {
    $partners_slide_id = $row['partners_slide_id'];
    $partners_slide_title = $row['partners_slide_title'];

    ?>

                                   <div class="item">
                                        <div class="prtn-icon">
                                            <img img src="images/partners_slide_images/<?php echo "$partners_slide_title"; ?>" alt="" height="100px">
                                        </div>
                                    </div>


<?php } ?>



                                </div>