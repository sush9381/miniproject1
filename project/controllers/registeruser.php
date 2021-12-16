<?php
session_start();
require(__DIR__.'\..\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));
//require(__DIR__.'\..\controllers\secure.php');
$errors=Array();
$values=Array();

$conn=connect();

$values['type'] = $_POST['type'];
$values['name']=trim($_POST['name']);
//$_POST['lastname']=trim($_POST['lastname']);
$values['dob']=trim($_POST['dob']);
$values['gender']=trim($_POST['gender']);
$values['contact']=trim($_POST['contact']);
//$values['address']=trim($_POST['Address']);
$values['email']=trim($_POST['email']);
$values['password']=trim($_POST['password']);
$values['password1']=trim($_POST['password1']);
//var_dump($values);

	if($_SERVER["REQUEST_METHOD"]=="POST"){

				try{
						if($values['type']=='user'){
						$stmt= $conn->prepare("select * from users where email= :value");
					}else{
						$stmt= $conn->prepare("select * from admin where email= :value");
					}
						$stmt->bindParam(':value',$value);
						$value = $_POST['email'];

						$stmt->execute();
						if($stmt->rowcount()>0){
							$errors['email']="Email is already taken";
						}else{
							$values['email']= $_POST['email'];
						}
				}catch(PDOException $e){
					echo "<br>".$e->getMessage();
					die();
				}
					
				if(strlen( $_POST['contact'])==10){
								$values['contact']= $_POST['contact'];
						
			}else{
				$errors['contact']="Invalid Contact Number";
			}
		
			if(strlen( $_POST['password'])>=6){
				$values['password']= $_POST['password'];
			}else{
				$errors['password']="Password should be of minimum 6 letters";
			}

			if($_POST['password']==$_POST['password1']){
				$values['password1']= $_POST['password1'];
			}else{
				$errors['password1']="Confirm Password should be same as Password you entered";
			}
		//if(empty($_POST['terms'])){
		//	$errors['terms']="Please Select terms and conditions";
		//}

	}
	else{
		flash('danger','something went wrong');
		$_SESSION['errors']=$errors;
		redirectTo(localhost('register.php'));
	}
	if(count($errors)==0){
		try{
			//$values['password']= md5($values['password']);
			//$sql= "insert into users values('', :firstname, :lastname, :dob, :gender, :contact, :email, :password)";
			if($values['type']=="user")
				$sql= "insert into users(`name`, `DOB`, `gender`, `contact`, `email`, `password`) values ('".$values['name']."','".$values['dob']."','".$values['gender']."',".$values['contact'].",'".$values['email']."','".$values['password'] ."')";
			else
				$sql= "insert into admin( `name`, `dob` ,`gender`,`contact` , `email`, `password`) values ('".$values['name']."','".$values['dob']."','".$values['gender']."',".$values['contact'].",'".$values['email']."','".$values['password'] ."')" ;
			$stmt= $conn->prepare($sql);
			$stmt->execute($values);

			//$_SESSION['_login']=$user['user_id'];
			if($values['type']=="user"){
			try{
				$sql= "select id from users where email='".$values['email']."'";
				$stmt= $conn->prepare($sql);
				$stmt->execute();
				$uid=Array();
				$uid=$stmt->fetchall();
				//var_dump($uid);
				$sql= "insert into validation_certificate (uid) values('".$uid[0]['id']."')";
				//var_dump($sql);
				//die();

				$stmt= $conn->prepare($sql);
				$stmt->execute();
				}
			catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
			}
			connect_close();
//			echo "Data successfully inserted";
//			die();
			flash('success','Your account has been created');

			redirectTo(localhost('login.php'));

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}else{
		//$_SESSION['values']=$values;
		$_SESSION['value']=$values;
		$_SESSION['error']=$errors;
		//var_dump($values);
		//var_dump($errors);
		//die();
		
		redirectTo(localhost('register.php'));

	}

?>