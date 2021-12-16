<?php
	session_start();
	require(__DIR__.'\..\config\helper.php');
	require(rootDir('/eventopedia/config/connect.php'));
	$errors=Array();
	$values=Array();

	$conn=connect();

	$values['password']=trim($_POST['password']);
	$values['newp']=trim($_POST['newp']);
	$values['newp1']=trim($_POST['newp1']);
	

if($_SESSION['type']=='user'){
	if($values['newp']!=$values['newp1']){
		flash('danger','New password and confirm password must be same');
		redirectTo(localhost('changepassword.php'));
	}
	else {
		try{
			$stmt= $conn->prepare("select * from users where id='".$_SESSION['_login']."' && password='".$values['password']."'");

						$stmt->execute();
						if($stmt->rowcount()>0){
							$sql= "update users set password= '".$values['newp']."' where id='".$_SESSION['_login']."'" ;
							$stmt= $conn->prepare($sql);
							$stmt->execute();
							flash('success','Your Password has been updated');
							redirectTo(localhost('index.php'));
						}else{
							flash('danger','Invalid Password');
							redirectTo(localhost('changepassword.php'));
						}
		

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}	
}else{
	if($values['newp']!=$values['newp1']){
		flash('danger','New password and confirm password must be same');
		redirectTo(localhost('changepassword.php'));
	}
	else {
		try{
			$stmt= $conn->prepare("select * from admin where id='".$_SESSION['_login']."' && password='".$values['password']."'");

						$stmt->execute();
						if($stmt->rowcount()>0){
							$sql= "update admin set password= '".$values['newp']."' where id='".$_SESSION['_login']."'" ;
							$stmt= $conn->prepare($sql);
							$stmt->execute();
							flash('success','Your Password has been updated');
							redirectTo(localhost('index.php'));
						}else{
							flash('danger','Invalid Password');
							redirectTo(localhost('changepassword.php'));
						}
		

		}
		catch(PDOException $e){
			echo "<br>".$e->getMessage();
			die();	

		}
	}
}

?>