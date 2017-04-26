
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['name']) and 
			isset($_POST['usn']) and 
				isset($_POST['mobileno']) and
					isset($_POST['email']) and
						isset($_POST['dept']) and
							isset($_POST['sem']) and
								isset($_POST['section']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createStudent( 	$_POST['name'],
									$_POST['usn'],
									$_POST['mobileno'],
									$_POST['email'],
									$_POST['dept'],
									$_POST['sem'],
									$_POST['section']
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "Student registered successfully";
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Some error occurred please try again";			
		}elseif($result == 0){
			$response['error'] = true; 
			$response['message'] = "It seems you are already registered, please choose a different email and username";						
		}

	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);
