<?php
	include('db.php');
	
	function create($user, $date, $comment){
		$conn = connect();
		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$user', '$date', '$comment')";
		
		if($conn->query($sql)){
			return true;
		}else{
			return false;
		}
		
		$conn->close();		
	}
	
	function select(){
		$conn = connect();
		$sql = "SELECT * FROM comments";
		
		$result = $conn->query($sql);
		
		$temp = array();
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				$comments = ['cid'=>$row['cid'], 'uid'=>$row['uid'], 'date'=>$row['date'],
							 'message'=>nl2br($row['message'])];
				array_push($temp,$comments);
			}
		}else{
			$conn0->close();
			return null;
		}
		
		return $temp;
	}
	
	function delete($id){
		$conn=connect();
		$sql = "DELETE FROM comments WHERE cid='".$id."'";
		
		if($conn->query($sql)){
			return true;
		}else{
			return false;
		}
		
		$conn->close();
	}
	
	function update($cid,$uid=null,$date=null,$message=null){
		$conn = connect();
		$sql = "UPDATE comments";
		$set=array('SET');

		if($uid!=null){
			if(count($set)>0){
				array_pop($set);
				$sql=$sql." SET uid='".$uid."'";
			}else{
				$sql=$sql.", uid='".$uid."'";
			}
		}
		
		if($date!=null){
			if(count($set)>0){
				array_pop($set);
				$sql=$sql." SET date='".$date."'";
			}else{
				$sql=$sql.", date='".$date."'";
			}
		}
		
		if($message!=null){
			if(count($set)>0){
				array_pop($set);
				$sql=$sql." SET message='".$message."'";
			}else{
				$sql=$sql.", message='".$message."'";
			}
		}
		
		$sql=$sql." WHERE cid='".$cid."'";
		
		if($conn->query($sql)){
			return true;
		}else{
			return false;
		}
		
		$conn->close();
	}
?>