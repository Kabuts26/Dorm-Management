<?php include('db_connect.php');?>

<?php
	// Initialize message variable
	$msg = "";
	// Create database connection
	$db = mysqli_connect("localhost", "root", "", "house_rental_db");

	// If upload button is clicked ...
	if (isset($_POST['upload'])) {
	// Get image name
	//$image = $_FILES['image']['name'];
	// Get text
	$event = mysqli_real_escape_string($db, $_POST['event']);

	$price = mysqli_real_escape_string($db, $_POST['price']);

	// image file directory
	//$target = "images/".basename($image);

	$sql = "INSERT INTO images (event, price) VALUES ('$event','$price' )";
	// execute query
	mysqli_query($db, $sql);

	//if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	//$msg = "Image uploaded successfully";
	//}
	}
	$result = mysqli_query($db, "SELECT * FROM images");
?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-1 mt-1">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>Announcement</b>
						<br>
						<br>
							<form method="POST" action="index.php?page=announce" enctype="multipart/form-data">
							  	<!--<input type="hidden" name="size" value="10000"> -->
							  	<div>
							  	  <!-- <input type="file" name="image"> -->
							  	  <b>Number of Rooms Vacant</b>
							  	  <input type="text" name="event">
							  	  <b>Price</b>
							  	  <input type="text" name="price">
							  	  <br><br>
							  		<button type="submit" name="upload" class="btn btn-primary">POST</button>
							  	</div>
							</form>
						<br>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>