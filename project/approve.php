<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));

	$conn=connect();
	$sql="select id from event where status='approved' && aid='".$_SESSION['_login']."'";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$eid= Array();
	$eid=$stmt->fetchall();

	$c=null;
    //var_dump($eid);
    //die();
    for ($i=0; $i<count($eid); $i++){
    	$c=$c."".$eid[$i]['id']." OR eid=";
		}
	//var_dump(isset($c));
    //die();
if(isset($c)){
$p=strrpos($c, "OR");
//var_dump($p);
    $i=0;
    //$e=str_ireplace(",","'," , $c)
    $c=substr($c, $i,$p);

    
$sql="select uid from eventregistered where status='pending' && eid=".$c;
	//var_dump($sql);
$stmt=$conn->prepare($sql);
    $c1=null;
    $cer1=null;
    $stmt->execute();
    $uid= Array();
    $uid=$stmt->fetchall();
    //var_dump($c);
     for ($i=0; $i<count($uid); $i++){
    $c1=$c1."".$uid[$i]['uid']." OR users.id=";
    //$cer1=$cer1."".$uid[$i]['uid']." OR uid=";
	}
//var_dump(isset($c1));
	if(isset($c1)){
	$p=strrpos($c1, "OR");
//var_dump($p);
    $i=0;
    //$e=str_ireplace(",","'," , $c)
    $c1=substr($c1, $i,$p);

    $sql="select * from users,validation_certificate where 
    users.id=validation_certificate.uid &&( users.id=".$c1 .")";
	//var_dump($sql);
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $users= Array();
    $users=$stmt->fetchall();


	
	//$lid=$stmt->fetch();
	//var_dump($lid);
	 //var_dump($_SESSION['_login']);
	//die();


//$stmt=$conn->prepare("SELECT case_id, client_id, status FROM cases WHERE `l_id`=".$lid['l_id']." AND `status`='pending' ");	
//$stmt->execute($_SESSION);
//$id=Array();
//$id=$stmt->fetchall();
}
}
?>
<font size="4" color="green" face="Comic Sans MS">
<table  border="0" align="center" height=150 width=400 cellpadding=30 cellspacing="1" bgcolor="yellow">
<tr>
<th class="x"> User Id </th>
<th> Name </th>
<th> Email </th>
<th> Validation Certificate </th>
<th> Level </th>
<th> Approve </th>
</tr>

<?php
	if(isset($users)){
for ($i=0; $i<count($users); $i++) {
	// echo $id[$i];
?>
<form action="controllers/approvepar.php" method="post">
<?php

	echo "<tr><td>". $users[$i]['id']."</td><td>". $users[$i]['name']."</td><td>". $users[$i]['email']."</td><td>";
	 if($users[$i]['location']!=NULL){
	 	echo "<a href=".$users[$i]['location'].">view</a>";
	 }
	 	else{ echo "No Certificate"; }
	//"<a href=".$users[$i]['location'].">view</a></td><td>
	echo "</td><td>".$users[$i]['level']."</td><td>
	<div class='right-w3l'>
                <input type='submit' name='approve' class='form-control bg-theme' value='Approve".$users[$i]['id']."'>
    </div>
	</td>
	</tr>";
}
	# code..
}
$_SESSION['eid']=$c;
?>
</form>



</table>

<?php
	//var_dump($cer);
	//die();
	require('includes/foot.php');
?>