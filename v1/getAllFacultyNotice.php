<?php 

require_once '../includes/DbOperations.php';

$response = array(); 
$array=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['receiver']) and isset($_POST['type']) and isset($_POST['dept']) and isset($_POST['designation'])){
		$db = new DbOperations(); 

		
			$notice = $db->getAllFacultyNotice($_POST['receiver'], $_POST['type'], $_POST['dept'], $_POST['designation']);
			while($user = mysqli_fetch_assoc($notice)){
			$response['error'] = false; 
			$response['datetime'] = $user['datetime'];
			$response['title'] = $user['title'];
			$response['content'] = $user['content'];
			$response['sender'] = $user['sender'];
			$response['sendermail']=$user['sendermail'];
			$response['receiver']=$user['receiver'];
			$response['type'] = $user['type'];
			$response['dept'] = $user['dept'];
			$response['designation'] = $user['designation'];
			$array[]=$response;
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($array);