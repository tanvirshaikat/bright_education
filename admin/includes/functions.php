<?php 

function confirmQuery($result){
	global $connection;
	if ($result) {
		echo "Your post has been published!";
	} else {
		die("QUERY FAILED" . mysqli_error($connection));
	}
}

function insert_categories() {


	global $connection;

	if (isset($_POST['submit'])) {
	$cat_title = $_POST['cat_title'];
	$cat_link = $_POST['cat_link'];

	if ($cat_title=="" || empty($cat_title)) {
	echo "This field should not be empty!";
	} else {
	$query= "INSERT INTO categories(cat_title, cat_link) ";
	$query.= "VALUE('{$cat_title}', '{$cat_link}') ";

	$cat_query= mysqli_query($connection, $query);
	if (!$cat_query) {
	die("QUERY FAILRD" . mysql_error($cat_query));
	} else {
	echo "Your Category has been stored succesfully.";
	}

	}

	}


}

function insert_slide_video() {


	global $connection;

	if (isset($_POST['submit'])) {
	$slide_video_title = $_POST["".'slide_video_title'];

	if ($slide_video_title=="" || empty($slide_video_title)) {
	echo "This field should not be empty!";
	} else {
	$query= "INSERT INTO slide_video(slide_video_title) ";
	$query.= "VALUE('{$slide_video_title}') ";

	$slide_video_query= mysqli_query($connection, $query);
	if (!$slide_video_query) {
	die("QUERY FAILRD" . mysql_error($slide_video_query));
	} else {
	echo "Your Youtube ID has been stored succesfully.";
	}

	}

	}


}

function insert_tag() {


	global $connection;

	if (isset($_POST['submit'])) {
	$tag_title = $_POST['tag_title'];

	if ($tag_title=="" || empty($tag_title)) {
	echo "This field should not be empty!";
	} else {
	$query= "INSERT INTO tag(tag_title) ";
	$query.= "VALUE('{$tag_title}') ";

	$tag_query= mysqli_query($connection, $query);
	if (!$tag_query) {
	die("QUERY FAILRD" . mysql_error($tag_query));
	} else {
	echo "Your tag has been stored succesfully.";
	}

	}

	}


}

function findAllcategories(){

	global $connection;

	$query = "SELECT * FROM categories"; //find all categories id.
	$select_categories = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_categories)) {
	$cat_id = $row['cat_id'];
	$cat_title = $row['cat_title'];
	$cat_link = $row['cat_link'];

	echo "<tr>";
	echo "<td>$cat_id</td>";
	echo "<td>$cat_title</td>";
	echo "<td>$cat_link</td>";
	echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='categories.php?edit={$cat_id}'>Edit</button></a></center></td>";
    echo "<td><center><button class='btn btn-danger btn-sm' ><a style='text-decoration:none; color:#fff;' href='categories.php?delete={$cat_id}'>Delete</a></center></td>";

	echo "</tr>";
	}


}

function findAllslide_video(){

	global $connection;

	$query = "SELECT * FROM slide_video "; //find all slide_video id.
	$select_slide_video = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_slide_video)) {
	$slide_video_id = $row['slide_video_id'];
	$slide_video_title = $row['slide_video_title'];

	echo "<tr>";
	echo "<td>$slide_video_id</td>";
	echo "<td>$slide_video_title</td>";
	echo "<td><a href='slide_video.php?delete={$slide_video_id}'>Delete</a></td>";
	echo "<td><a href='slide_video.php?edit={$slide_video_id}'>Update</a></td>";
	echo "</tr>";
	}


}

function findAlltag(){

	global $connection;

	$query = "SELECT * FROM tag"; //find all tag id.
	$select_tag = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_tag)) {
	$tag_id = $row['tag_id'];
	$tag_title = $row['tag_title'];

	echo "<tr>";
	echo "<td>$tag_id</td>";
	echo "<td>$tag_title</td>";
	echo "<td><a href='tag.php?delete={$tag_id}'>Delete</a></td>";
	echo "<td><a href='tag.php?edit={$tag_id}'>Update</a></td>";
	echo "</tr>";
	}


}

function deleteCategories(){

	global $connection;
	if (isset($_GET['delete'])) {
	$the_cat_id = $_GET['delete'];
	$query = "DELETE FROM categories WHERE cat_id= {$the_cat_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("Location: categories.php");

	}
	}

function deleteslide_video(){

	global $connection;
	if (isset($_GET['delete'])) {
	$the_slide_video_id = $_GET['delete'];
	$query = "DELETE FROM slide_video WHERE slide_video_id= {$the_slide_video_id} ";
	$delete_query = mysqli_query($connection, $query);
	echo "<script> window.location='slide_video.php'; </script>";

	}
	}

function deleteslide_image(){

	global $connection;
	if (isset($_GET['delete'])) {
	$the_slide_image_id = $_GET['delete'];
	$query = "DELETE FROM slide_image WHERE slide_image_id= {$the_slide_image_id} ";
	$pathOfFile='/slideimages/dnews.jpg';
    unlink($pathOfFile);
	$delete_query = mysqli_query($connection, $query);
	echo " <script> window.location='slide_image.php'; </script>";

	}
	}



function deletetag(){

	global $connection;
	if (isset($_GET['delete'])) {
	$the_tag_id = $_GET['delete'];
	$query = "DELETE FROM tag WHERE tag_id= {$the_tag_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("Location: tag.php");

	}
	}



?>