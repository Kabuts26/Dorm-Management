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

<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
*{
  margin:0;
  padding:0;
  font-family:verdana;
}
#abc{
  width:100%;
  height:100vh;
  background-image: url(bg.jpg);
  background-size: cover;
}
nav{
  width: 100%;
  height: 50px;
  background-color: #0005;
  line-height: 50px;

}
nav ul{
  float: right;
  margin-right: 30px;
}
nav ul li{
  list-style-type: none;
  display: inline-block;
  transition: 0.7s all;
}
nav ul li:hover{
  background-color:#088;
}
nav ul li a{
  text-decoration: none;
  color: #fff;
  padding: 30px;
}
a:active{
	background-color:#088;
}
img{
  margin: 3px;
 	width: 230px;
 	height: 230px;
}
.logo table{
  margin-left: 20px;
  margin-top: -20px;
}
/*.box .logo img{
  border-radius: 5%;
  width: 230px;
  height: 230px;
}*/
.box .casa{
  float: right;
  margin-right: 60;
  font-style: oblique;
  margin-top: 10px;
  font-size:20px;
}
.box{
  width: 1000px;
  height: 500px;
  padding: 20px;
  margin: auto;
  margin-top: auto;
  background-color:rgb(34,139,34,.7);
  border-radius: 10px;
  color: white;
  text-align: center;   
}
.box label{
  color: white;
  font-size: 25px;
  font-family: serif;
}
.box .casa .Services{
  color: white;
  margin-left: 50px;
}
.box .casa .title{
  margin-right: 20px;
}
</style>
<body>
<div id="abc">
    <nav>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="ajax.php?action=logout">Login</a></li>
        </ul>
    </nav>
    <br><br><br>
    <div class="box">
      <div class="casa">
        <h1 class="title"><i>CASA SOLEIL</i></h1>
        <br><br><br>
         <?php
          $db = mysqli_connect("localhost", "root", "", "house_rental_db");
          $sql = "SELECT * FROM images";
          $result = mysqli_query($db, $sql);    
            while ($row = mysqli_fetch_array($result)) {
                  //echo "<td><img src='images/".$row['image']."'></td>";
                  echo " <table width='350' cellspacing='0'>";
                    echo "<tr>";
                      echo "<td><label>Number of Vacant: </label></td>";
                      echo "<td><label>".$row['event']." Rooms</label></td>";
                    echo "</tr>";
                    echo "<tr>";
                      echo "<td>___</td>";
                      echo "<td>___</td>";
                    echo "</tr>";
                    echo "<tr>";
                      echo "<td><label>Monthly Price: </label></td>";
                      echo "<td><label>".$row['price']." Pesos</label></td>";
                    echo "</tr>";
                  echo "</table>";
            }
          ?>
          <br><br><br><br><br><br>
          <table class="Services">
            <tr>
              <td><label>Services provided are:</label></td>
            </tr>
            <tr align="center">
              <td>Free wifi, Cable TV</td>
            </tr>
            <tr align="center">
              <td>Free toiletries</td>
            </tr>
            <tr align="center">
              <td>CCTV security</td>
            </tr>
          </table>
    </div>
      <div class="logo">
        <table cellspacing="0">
          <tr>
            <td><img class="bg2" src="background1.jpg"></td>
            <td><img class="bg2" src="room1.jpg"></td>
          </tr>
          <tr>
            <td><img class="bg2" src="room2.jpg"></td>
            <td><img class="bg2" src="room3.jpg"></td>
          </tr
        </table>
      </div>
    </div>
    <br><br>
  </div>
</div>
</body>
</html>