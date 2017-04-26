<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['name']) and isset($_POST['password'])){
		$db = new DbOperations(); 

		if($db->studentLogin($_POST['name'], $_POST['password'])){
			$user = $db->getStudentByUsername($_POST['name']);
			$response['error'] = false; 
			$response['name'] = $user['name'];
			$response['email'] = $user['email'];
			$response['mobileno'] = $user['mobileno'];
			$response['dept'] = $user['dept'];
			$response['sem'] = $user['sem'];
			$response['usn'] = $user['usn'];
			$response['section']=$user['section'];
		}else{
			$response['error'] = true; 
			$response['message'] = "Invalid name or password";			
		}

	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}

echo json_encode($response);