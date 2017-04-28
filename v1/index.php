<?php
	require_once '../includes/DbOperations.php';

	$db = new DbOperations(); 

		
	$notice = $db->getAllFacultyNotice('ALL', 'ALL', 'computer science', 'HOD']);
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
	echo json_encode($response);
?>
