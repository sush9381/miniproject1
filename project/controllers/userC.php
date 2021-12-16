<?php
session_start();
require(__DIR__.'\..\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));
$errors=Array();
$values=Array();

$conn=connect();
$values['level']= $_POST['level'];
$name= $_FILES['img']['name'];
$file=$_FILES['img']['tmp_name'];


if($_SERVER["REQUEST_METHOD"]=="POST"){

				try{
						$stmt= $conn->prepare("select location from validation_certificate where uid='".$_SESSION['_login']."'");
						$stmt->execute();
						$temp=$stmt->fetchall();
						//var_dump($temp);
						//die();
						if($temp[0]['location']!=NULL){
							$errors['validation_certificate']="You already have your validation Certificate cannot add more ";
							flash('danger','You already have your validation Certificate cannot add more ');
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
		redirectTo(localhost('user_certificate.php'));
	}



if(count($errors)==0){
		try{
			$file=$_FILES['img']['tmp_name'];
					move_uploaded_file($file,"C:/xampp/htdocs/Eventopedia/documents/".basename($_FILES["img"]["name"]));
					//echo "success";
			$values['photo']="documents/".$name;

			//$values['password']= md5($values['password']);
			//$sql= "insert into users values('', :firstname, :lastname, :dob, :gender, :contact, :email, :password)";
				$sql= "update validation_certificate set location='".$values['photo']."', level='".$values['level'] ."'
					where uid='".$_SESSION['_login']."'" ;
				//var_dump($sql);
			$stmt= $conn->prepare($sql);
			$stmt->execute();
			//$_SESSION['_login']=$user['user_id'];
			connect_close();
		//echo "Data successfully inserted";
		//		die();
			flash('success','Certificate has been Uploaded');

			redirectTo(localhost('index.php'));

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}else{
		$_SESSION['errors']=$errors;
		$_SESSION['values']=$values;
		redirectTo(localhost('validation_certificate.php'));

	}


?>