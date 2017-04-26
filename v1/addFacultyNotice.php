<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
				isset($_POST['title']) and
					isset($_POST['content']) and
						isset($_POST['sender']) and
						isset($_POST['sendermail']) and
							isset($_POST['receiver']) and
								isset($_POST['type']) and
									isset($_POST['dept']) and
										isset($_POST['designation']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createFacultyNotice( 
									$_POST['title'],
									$_POST['content'],
									$_POST['sender'],
									$_POST['sendermail'],
									$_POST['receiver'],
									$_POST['type'],
									$_POST['dept'],
									$_POST['designation']
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "Faculty notice added successfully";
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Some error occurred please try again";			
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
