<?php 
include 'db_connect.php';

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
	$url = 'https://www.itexmo.com/php_api/api.php';
	$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
	$param = array(
	  'http' => array(
		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		'method'  => 'POST',
		'content' => http_build_query($itexmo),
	  ),
	);
	$context  = stream_context_create($param);
	return file_get_contents($url, false, $context);
  }
  //##########################################################################
					  
  if($_POST){
	$number = $_POST['number'];
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	$api = "TR-DRIPC516561_WCN36";
	$passwd = "d]yq879w&2";
	$text = $name. ':' .$msg;
  
	if (!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg'])){
	  $result = itexmo($number, $text, $api, $passwd);
		if ($result == ""){
		echo "iTexMo: No response from server!!!
		Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
		Please CONTACT US for help. ";	
		}else if ($result == 0){
		echo "Message Sent!";
		}
		  else{	
		  echo "Error Num ". $result . " was encountered!";
		  } 
	  } 
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  </style>
  <body>
		<div class="container-fluid">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="col-md-12">
						<div class="row">
							<div class="col-sm-4">
								<div class="card border-primary">
									<div class="card-body bg-light">
										<h4><b>Customer Notification</b></h4>
									</div>
										<div class="card-footer">
											<div class="col-md-12">
												<form method="POST" action="index.php?page=reports">
													<div class="form-group">
													<label for="name">Your Name</label>
													<input type="text" maxlength="99" class="form-control" id="name" placeholder="Name" name="name" required>
													</div>
													<div class="form-group">
													<label for="number">Recipient's Mobile Number</label>
													<input type="text" maxlength="11" class="form-control" id="number" placeholder="Mobile Number" name="number" required>
													</div>
													<div class="form-group">
													<label for="msg">Your Message</label>
													<textarea class="form-control" rows="3" name="msg" placeholder="Message here" onkeyup="countChar(this)" required></textarea>
													</div>
													<p class="text-right" id="charNum">150</p>
													<button type="submit" class="btn btn-success">Send</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<img src="ResortLogo2.jpg" alt="" width="500px" length="50px" border-radius="25px">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    	<script>
      		function countChar(val){
        		var len = val.value.length;
				if(len >= 150){
					val.value = val.value.substring(0,85);
				}else{
					$('#charNum').text(150 - len);
				}
      		};
    	</script>
	</body>
</html>
