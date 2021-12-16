<?php
	session_start();
	require(__DIR__.'\..\config\helper.php');
	require(rootDir('/eventopedia/config/connect.php'));
	$errors=Array();
	$values=Array();

	$conn=connect();
	$values['eid']=$_POST['register'];
	$d=8;
	$eid=substr($values['eid'], $d);
	//$id=$_SESSION['_login'];
	//var_dump($eid);
	//var_dump($_SESSION['_login']);
	//die();

	if($_SERVER["REQUEST_METHOD"]=="POST"){

				try{
						$sql="select * from `eventregistered` where `uid`='".$_SESSION['_login']."' &&
							  `eid`='".$eid."'";
							 //var_dump($sql);

						$stmt= $conn->prepare($sql);
						//$stmt->bindParam(':value',$value);
						//$value = $_POST['email'];

						$stmt->execute();
						if($stmt->rowcount()>0){
							$errors['eventregistered']="Already Registered";
							flash('danger','You are already registered to the event');
						}else{
							//$values['email']= $_POST['email'];
						}
				}catch(PDOException $e){
					echo "<br>".$e->getMessage();
					die();
				}
					

		//if(empty($_POST['terms'])){
		//	$errors['terms']="Please Select terms and conditions";
		//}

	}
	else{
		flash('danger','something went wrong');
		$_SESSION['errors']=$errors;
		redirectTo(localhost('events.php'));
	}

	if(count($errors)==0){
		try{
			//$values['password']= md5($values['password']);
			//$sql= "insert into users values('', :firstname, :lastname, :dob, :gender, :contact, :email, :password)";
				$sql= "INSERT INTO `eventregistered`(`uid`, `eid`) VALUES ('".$_SESSION['_login']."','".$eid."')" ;
				//var_dump($sql);
				//die();
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			//$_SESSION['_login']=$user['user_id'];
			connect_close();
		//echo "Data successfully inserted";
		//		die();
			flash('success','You has been registered to the event');

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