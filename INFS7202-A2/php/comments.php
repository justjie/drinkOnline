<?php
	date_default_timezone_set('Australia/Brisbane');
	$user = "Anonymous";
	include "crud.php"
?>

<?php
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == 'POST'){
		$myUniqueID = json_decode($_POST['uniqueID'], true);
		if(strcmp($myUniqueID, "send") == 0){
			$comment = json_decode($_POST['dataSent'], true);
			$date = date("Y-m-d H:i:s");
			create($user, $date, $comment);
		}
		if(strcmp($myUniqueID, "delete") == 0){
			$deleteID = json_decode($_POST['deleteData'], true);
			delete($deleteID['id']);
		}
		if(strcmp($myUniqueID, "edit") == 0){
			$editData = json_decode($_POST['editData'], true);
			$date = date("Y-m-d H:i:s");
			update($editData['id'],$user,$date,$editData['message']);
		}
	}
	$array = select();
	echo json_encode($array);
?>
