<?php 
$mysqli = new mysqli("localhost", "id6294542_admin", "ramdhan", "id6294542_dblogger");
$medicine="%{$_POST['medicine']}%"; 
$response=array();
$temp=array();
$result=array();
if($stmt = $mysqli->prepare('SELECT phar_name FROM cims_list WHERE med_spec_name like ?'))
    {
     
     $stmt->bind_param('s', $medicine);
     $stmt->execute();
     $stmt->store_result();
     $stmt->bind_result($temp);

	    while ($stmt->fetch()) {
                            array_push($result,$temp);
							}
							
        if (!empty($stmt->num_rows)){

                                        $response["success"]=1;
                                        $response["data"]=$result;
                                        }
        else                            {
                                         $response["success"]=0;
                                         $response["message"]="Medicine not available in any Pharmacies";
                                        }   
die(json_encode($response));                                        
$stmt->close();

}
 mysqli_close($mysqli); 
 ?>
 