<?php

if(isset($_SESSION['_login'])){
}
else{
	flash('danger',"Please Login to proceed");
	redirectTo(localhost('eventopedia/login.php'));
}


?>