<?php
session_start();
require(__DIR__.'\..\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));
//require(__DIR__.'\..\controllers\secure.php');
$errors=Array();
$values=Array();

$conn=connect();

$values['ename'] = $_POST['ename'];
$values['date']=trim($_POST['date']);
//$_POST['lastname']=trim($_POST['lastname']);
$values['venue']=trim($_POST['venue']);
$values['price']=trim($_POST['price']);
$values['details']=trim($_POST['details']);
//$values['Stype']=trim($_POST['Stype']);
$name= $_FILES['photo']['name'];
$values['photo']=$name;
$file=$_FILES['photo']['tmp_name'];
if($_POST['Stype']=='others'){
	$values['Stype']=trim($_POST['Stype1']);
}else{
	$values['Stype']=trim($_POST['Stype']);
}

//var_dump($file);

//var_dump($values['photo']);
//die();

	if(count($errors)==0){
		try{
			//$values['password']= md5($values['password']);
			//$sql= "insert into users values('', :firstname, :lastname, :dob, :gender, :contact, :email, :password)";
				$sql= "insert into event(`id`, `aid`, `name`, `date`, `venue`, `price`, `details`, `photo`, `sportsType`) values ('','".$_SESSION['_login']."','".$values['ename']."','".$values['date']."','".$values['venue']."','".$values['price']."','".$values['details']."','".$values['photo']."','".$values['Stype'] ."')" ;
				//var_dump($sql);
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			move_uploaded_file($file,"C:/xampp/htdocs/Eventopedia/documents/".basename($_FILES["photo"]["name"]));
			$values['photo']="documents/".$name;
			//$_SESSION['_login']=$user['user_id'];
			connect_close();
		//echo "Data successfully inserted";
		//		die();
			flash('success','Event has been created');

			redirectTo(localhost('eventstatus.php'));

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}else{
		$_SESSION['errors']=$errors;
		$_SESSION['values']=$values;
		redirectTo(localhost('createEvent.php'));

	}

?>