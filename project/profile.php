<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));

	$conn=connect();
if($_SESSION['type']=='user'){
	$sql="select * from users,validation_certificate where
	users.id=validation_certificate.uid && users.id='".$_SESSION['_login']."'";
	//var_dump($sql);
	//
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$prof= Array();
	$prof=$stmt->fetchall();
	//var_dump($prof[0]['gender']);
	//die();
	//$eid['id'];
?>
<div class="modal-body align-w3">
        <form action="controllers/updateProfile.php" method="post" class="p-sm-3">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $prof[0]['name']; ?>" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-dob" class="col-form-label">Date of Birth</label>
                <input type="date" class="form-control" value="<?php echo $prof[0]['DOB']; ?>" name="dob" id="recipient-name"
                    required>
            </div>
            <label for="recipient-gender" class="col-form-label">Gender</label>
                <select name="gender" required>
                    <option value="m" <?php if($prof[0]['gender']=='m'){echo "selected"; }  ?> >Male</option>
                    <option value="f" <?php if($prof[0]['gender']=='f'){echo "selected"; }  ?>>Female</option>
                    <option value="o" <?php if($prof[0]['gender']=='o'){echo "selected"; }  ?>>Others</option>
                </select>
            <div class="form-group">
                <label for="recipient-contact" class="col-form-label">Contact Number</label>
                <input type="number" class="form-control" value="<?php echo $prof[0]['contact']; ?>" name="contact" 
                id="recipient-name" required>
            </div>
            <div class="form-group">
                <label for="recipient-email" class="col-form-label">Email</label>
                <input type="email" class="form-control" value="<?php echo $prof[0]['email']; ?>" name="email" id="recipient-email"
                    required>
                    <?php
                    if(isset($_SESSION['error']['email'])){
                    echo "<p class='red'>*".$_SESSION['error']['email']."</p>";
                }
                         ?>
            </div>
            <div class="form-group">
                <label for="recipient-email" class="col-form-label">Validation Certificate</label>
                <?php
                	if($prof[0]['location']!=NULL){
                ?>
                <p><a <?php echo "href='".$prof[0]['location']."'"; ?> >VIEW CERTIFICATE</a>
                <div class="right-w3l">
                	<input type="submit" class="form-control bg-theme" name="button" value="Delete Certificate">
           		</div>
           	<?php
           }else{ echo "<br><p class='red'>Please Upload Certificate to view</p>";}
           	?>
            </div>
          
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" name="button" value="Update Values">
                 <input type="submit" class="form-control bg-theme" name="button" value="Change Password">
            </div>
        </form>
    </div>


<?php
}else{
	$sql="select * from admin where id='".$_SESSION['_login']."'";
	//var_dump($sql);
	//
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$prof= Array();
	$prof=$stmt->fetchall();
	//var_dump($prof[0]['dob']);
	//die();
	//var_dump($prof[0]['gender']);
	//die();
	//$eid['id'];

?>
<div class="modal-body align-w3">
        <form action="controllers/updateProfile.php" method="post" class="p-sm-3">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $prof[0]['name']; ?>" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-dob" class="col-form-label">Date of Birth</label>
                <input type="date" class="form-control" value="<?php echo $prof[0]['dob']; ?>" name="dob" id="recipient-name"
                    required>
            </div>
            <label for="recipient-gender" class="col-form-label">Gender</label>
                <select name="gender" required>
                    <option value="m" <?php if($prof[0]['gender']=='m'){echo "selected"; }  ?> >Male</option>
                    <option value="f" <?php if($prof[0]['gender']=='f'){echo "selected"; }  ?>>Female</option>
                    <option value="o" <?php if($prof[0]['gender']=='o'){echo "selected"; }  ?>>Others</option>
                </select>
            <div class="form-group">
                <label for="recipient-contact" class="col-form-label">Contact Number</label>
                <input type="number" class="form-control" value="<?php echo $prof[0]['contact']; ?>" name="contact" 
                id="recipient-name" required>
            </div>
            <div class="form-group">
                <label for="recipient-email" class="col-form-label">Email</label>
                <input type="email" class="form-control" value="<?php echo $prof[0]['email']; ?>" name="email" id="recipient-email"
                    required>
            </div>
          
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" name="button" value="Update Values">
                 <input type="submit" class="form-control bg-theme" name="button" value="Change Password">
            </div>
        </form>
    </div>


<?php
}
	require('includes/foot.php');
?>