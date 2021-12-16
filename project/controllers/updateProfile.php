<?php
	session_start();
	require(__DIR__.'\..\config\helper.php');
	require(rootDir('/eventopedia/config/connect.php'));
	$errors=Array();
	$values=Array();

	$conn=connect();
	//$values['type'] = $_POST['type'];
	$values['name']=trim($_POST['name']);
	//$_POST['lastname']=trim($_POST['lastname']);
	$values['dob']=trim($_POST['dob']);
	$values['gender']=trim($_POST['gender']);
	$values['contact']=trim($_POST['contact']);
	//$values['address']=trim($_POST['Address']);
	$values['email']=trim($_POST['email']);
	$values['button']=$_POST['button'];
	//var_dump($_SESSION['type']);
	//die();
	$null=null;
if($_SESSION['type']=='user'){
	if($values['button']=='Change Password') {

		redirectTo(localhost('changepassword.php'));

	}elseif($values['button']=='Delete Certificate') {
		try{
			$sql= "update `validation_certificate` set location='".$null."' where uid='".$_SESSION['_login']."'" ;
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			flash('success','Certificate has been removed');
			redirectTo(localhost('profile.php'));
		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}

	}elseif($values['button']=='Update Values') {
						$stmt= $conn->prepare("select * from users where email='".$values['email']."' && id!='".$_SESSION['_login']."' ");
						$stmt->execute();
						if($stmt->rowcount()>0){
							$errors['email']="Email is already taken";
						}
		if(count($errors)==0){
		try{
			$sql= "update `users` set name='". $_POST['name'] ."', dob='". $_POST['dob'] ."',contact='". $_POST['contact'] .
			"',email='". $_POST['email'] ."',gender='". $_POST['gender'] ."'  where id='".$_SESSION['_login']."'" ;
			//var_dump($sql);
			//die();
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			flash('success','Your Profile has been Updated');
			redirectTo(localhost('profile.php'));
		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
		}else{
			$_SESSION['error']=$errors;
			redirectTo(localhost('profile.php'));
		}
	}
}else{
	if($values['button']=='Change Password') {

		redirectTo(localhost('changepassword.php'));

	}elseif($values['button']=='Update Values') {
		$stmt= $conn->prepare("select * from admin where email='".$values['email']."' && id!='".$_SESSION['_login']."' ");
						$stmt->execute();
						if($stmt->rowcount()>0){
							$errors['email']="Email is already taken";
						}
if(count($errors)==0){
		try{

			$sql= "update `admin` set name='". $_POST['name'] ."', dob='". $_POST['dob'] ."',contact='". $_POST['contact'] .
			"',email='". $_POST['email'] ."',gender='". $_POST['gender'] ."'  where id='".$_SESSION['_login']."'" ;
			//var_dump($sql);
			//die();
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			flash('success','Your Profile has been Updated');
			redirectTo(localhost('profile.php'));
		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}else{
			$_SESSION['error']=$errors;
			redirectTo(localhost('profile.php'));
		}
}
}

?>