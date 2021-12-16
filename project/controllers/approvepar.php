<?php
	session_start();
	require(__DIR__.'\..\config\helper.php');
	require(rootDir('/eventopedia/config/connect.php'));
	$errors=Array();
	$values=Array();

	$conn=connect();
	$values['uid']=$_POST['approve'];
	$d=7;
	$uid=substr($values['uid'], $d);
	//$id=$_SESSION['_login'];
	//var_dump($values['uid']);
	//var_dump($uid);
	//var_dump($_SESSION['eid']);
	//die();

	if(count($errors)==0){
		try{
			//$values['password']= md5($values['password']);
			//$sql= "insert into users values('', :firstname, :lastname, :dob, :gender, :contact, :email, :password)";
				$sql= "Update `eventregistered` set status='approved' where uid='".$uid."' && eid='".$_SESSION['eid']."'" ;
				//var_dump($sql);
				//die();
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			//$_SESSION['_login']=$user['user_id'];
			connect_close();
		//echo "Data successfully inserted";
		//		die();
			flash('success','Participant Has been approved');

			redirectTo(localhost('index.php'));

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}else{
		$_SESSION['errors']=$errors;
		$_SESSION['values']=$values;
		redirectTo(localhost('events.php'));

	}

?>