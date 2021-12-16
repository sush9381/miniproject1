<?php
session_start();
require(__DIR__.'\..\config\helper.php');
//include(__DIR__.'\..\controllers\secure.php');
require(rootDir('/eventopedia/config/connect.php'));
$errors=Array();
$values=Array();

$conn=connect();

//$values['type'] = $_POST['type'];
$values['event']= $_POST['event'];
//var_dump($values['event']);
//die();
//$values['password']= $_POST['password'];
//$_SESSION['type']=$values['type'];



if(isset($_SESSION['_login'])){

			if($_SESSION['type']=="user")
					redirectTo(localhost('events.php'));
			else
					redirectTo(localhost('createEvent.php'));
	
	}
	else{
		//$_SESSION['errors']=$errors;
		//$_SESSION['values']=$values;
		flash('danger','Please Login First');
		redirectTo(localhost('login.php'));
		//var_dump($_SESSION['errors']);

	}

?>