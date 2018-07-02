<article class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="top-headline">
                <h1>RPL</h1>
                <p>Recognition of Prior Learning</p>
                <div class="headline-icon">
                    <img src="img/grad-icon.png" alt="">
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">

                    <div class="rpl-box">

    <?php 

    $query = "SELECT * FROM home_rpl where home_rpl_id= 1";
    $select_rpl = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_rpl)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_subheader = substr($row['home_rpl_subheader'],0,185);
    $home_rpl_image = $row['home_rpl_image'];

    ?>

                                        <img src="images/home_rpl/<?php echo $home_rpl_image; ?>" alt="" width="570" height="260">
                                        <span><i class="fa fa-graduation-cap"></i></span>
                                        <div class="rpl-box-title">

                                            <h3>What is RPL</h3>
                                        </div>
                                        <div class="rpl-hover-box">

                                            <p>
                                                <?php echo $home_rpl_subheader; ?>
                                            </p>
                                            <a href="what_rpl.php"><button>Read More</button></a>
    <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div  class="rpl-box">


    <?php 

    $query = "SELECT * FROM home_rpl where home_rpl_id= 2";
    $select_rpl = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_rpl)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_subheader = substr($row['home_rpl_subheader'],0,185);
    $home_rpl_image = $row['home_rpl_image'];
    ?>

                                       <img src="images/home_rpl/<?php echo $home_rpl_image; ?>" alt="" width="570" height="260">
                                        <span><i class="fa fa-cog"></i></span>
                                        <div class="rpl-box-title">
                                            <h3>Process of RPL</h3>
                                        </div>
                                        <div class="rpl-hover-box">

                                            <p>
                                                <?php echo $home_rpl_subheader; ?>
                                            </p>
    <?php } ?>
                                            <a href="rpl_steps.php"><button>Read More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">
                                    <div  class="rpl-box">
    <?php 


    $query = "SELECT * FROM home_rpl where home_rpl_id= 3";
    $select_rpl = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_rpl)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_subheader = substr($row['home_rpl_subheader'],0,185);
    $home_rpl_image = $row['home_rpl_image'];
    ?>
                                        <img src="images/home_rpl/<?php echo $home_rpl_image; ?>" alt="" width="570" height="260">
                                        <span><i class="fa fa-list"></i></span>
                                        <div class="rpl-box-title">
                                            <h3>Checklist of RPL</h3>
                                        </div>
                                        <div class="rpl-hover-box">

                                            <p>
                                                <?php echo $home_rpl_subheader; ?>
                                            </p>
    <?php } ?>
                                            <a href="checklist_rpl.php"><button>Read More</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="rpl-box">
    <?php 
    $query = "SELECT * FROM home_rpl where home_rpl_id= 4";
    $select_rpl = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_rpl)) {
    $home_rpl_id = $row['home_rpl_id'];
    $home_rpl_subheader = substr($row['home_rpl_subheader'],0,185);
    $home_rpl_image = $row['home_rpl_image'];
    ?>
                                        <img src="images/home_rpl/<?php echo $home_rpl_image; ?>" alt="" width="570" height="260">
                                        <span><i class="fa fa-get-pocket"></i></span>
                                        <div class="rpl-box-title">
                                            <h3>Choose your course</h3>
                                        </div>
                                        <div class="rpl-hover-box">




                                            <p>
                                                <?php echo $home_rpl_subheader; ?>
                                            </p>
    <?php } ?>
                                            <a href="rpl.php"><button>Read More</button></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </article>