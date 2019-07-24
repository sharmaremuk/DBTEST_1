<?php 
$mysqli = new mysqli("localhost", "id6294542_admin", "ramdhan", "id6294542_dblogger");
#$password=isset($_POST['password']); 
#$username=isset($_POST['username']); 
$password=$_POST['password']; 
$username=$_POST['username']; 

 if (empty($username) || empty($password)) { 
						// Create some data that will be the JSON response 
						$response["success"] = 0; 
						$response["message"] = "One or both of the fields are empty .";
						//die is used to kill the page, will not let the code below to be executed. It will also display the parameter, that is the json data which our android application will parse to be shown to the users 
						die(json_encode($response)); 
															} 
else    {																		
	 $stmt = $mysqli->prepare("SELECT count(*) FROM `login` WHERE username=? and password=?");
	 $stmt->bind_param('ss', $username,$password);
     $stmt->execute();
     $stmt->store_result();
     $stmt->bind_result($temp);
     $stmt->fetch();
				if (!empty($temp)) { 
							 $response["success"] = 1; 
							 $response["message"] = "Sucessfully logged in"; 
							 die(json_encode($response));
											} 
				else{ 
							 $response["success"] = 0; 
							 $response["message"] = "invalid username or password "; 
							 die(json_encode($response));
											} 
$res->close();
 				 } 
 mysqli_close($mysqli); 
 ?>

