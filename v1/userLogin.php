<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='GET'){
	if(isset($_GET['name']) and isset($_GET['password'])){
		$db = new DbOperations(); 

		if($db->userLogin($_GET['name'], $_GET['password'])){
			$user = $db->getUserByUsername($_GET['name']);
			$response['error'] = false; 
			$response['name'] = $user['name'];
			$response['email'] = $user['email'];
			$response['mobileno'] = $user['mobileno'];
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