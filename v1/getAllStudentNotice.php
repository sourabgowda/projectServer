<?php 

require_once '../includes/DbOperations.php';

$response = array(); 
$array=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['receiver']) and isset($_POST['type']) and isset($_POST['dept']) and isset($_POST['sem']) and isset($_POST['section'])){
		$db = new DbOperations(); 

		
			$notice = $db->getAllStudentNotice($_POST['receiver'], $_POST['type'], $_POST['dept'], $_POST['sem'], $_POST['section']);
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
			$response['sem'] = $user['sem'];
			$response['section'] = $user['section'];
			$array[]=$response;
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($array);