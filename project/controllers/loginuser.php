<?php
session_start();
require(__DIR__.'\..\config\helper.php');
//include(__DIR__.'\..\controllers\secure.php');
require(rootDir('/eventopedia/config/connect.php'));
$errors=Array();
$values=Array();

$conn=connect();

$values['type'] = $_POST['type'];
$values['email']= $_POST['email'];
$values['password']= $_POST['password'];
$_SESSION['type']=$values['type'];



if(count($errors)==0){
		try{

			if($values['type']=="user")
					$sql= "select * from users where email='".$values['email']."' && password='".$values['password']."';" ;
			else
					$sql= "select * from admin where email='".$values['email']."' && password='".$values['password']."';" ;
			
			$stmt= $conn->prepare($sql);
			$stmt->execute($values);
			
			if($stmt->rowCount()>0){
				$user= $stmt->fetch();
				$_SESSION['_login']=$user['id'];
				$_SESSION['type']=$values['type'];

				//$_SESSION['_login']=$user['id'];
				//var_dump($_SESSION['_login']);
				//var_dump($_SESSION['type']);
				//die();
			

				//login($user['user_id']);



				flash('success',"Welcome {$user['firstname'] }! You have successfully logged in ");
				redirectTo(localhost('index.php'));
			//$_SESSION['_login']=$user['user_id'];
/*
				if(isset($_SESSION['previous_url'])){
					$_SESSION['_login']=$user['user_id'];
					$previous_url=$_SESSION['previous_url'];
					unset($_SESSION['previous_url']);
					redirectTo(localhost($_SESSION['previous_url']));
				}
				else{
					$_SESSION['_login']=$user['user_id'];
					redirectTo(localhost('index.php'));
				}
*/			}
			else{
				unset($_SESSION['_login']);
				//$errors['email']="Invalid email or password";
				//echo "Email or password is incorrect";
				//die();
				flash('danger','Invalid email or password');
				redirectTo(localhost('login.php'));
			}
			connect_close();

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}
	else{
		$_SESSION['errors']=$errors;
		$_SESSION['values']=$values;
		redirectTo(localhost('login.php'));
		//var_dump($_SESSION['errors']);

	}

?>