<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));

	$conn=connect();
	$sql="select eid from eventregistered where uid='".$_SESSION['_login'] ."' && status='approved'";
	$stmt=$conn->prepare($sql);
	$c="";
	$stmt->execute();
	$eid= Array();
	$eid=$stmt->fetchall();
	for ($i=0; $i<count($eid); $i++){
	$c=$c."".$eid[$i]['eid']." OR id=";
}
$p=strrpos($c, "OR");
//var_dump($p);
	$i=0;
	//$e=str_ireplace(",","'," , $c)
	$c=substr($c, $i,$p);

	//var_dump($c);
	//die();
$sql="select * from event where id='".$c."'";
//var_dump($sql);
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$event= Array();
	$event=$stmt->fetchall();

	//var_dump($eventregistered);
	//die();
	//$lid=$stmt->fetch();
	//var_dump($lid);
	 //var_dump($_SESSION['_login']);
	//die();


//$stmt=$conn->prepare("SELECT case_id, client_id, status FROM cases WHERE `l_id`=".$lid['l_id']." AND `status`='pending' ");	
//$stmt->execute($_SESSION);
//$id=Array();
//$id=$stmt->fetchall();
?>
<font size="4" color="green" face="Comic Sans MS">
<table  border="0" align="center" height=150 width=400 cellpadding=30 cellspacing="1" bgcolor="yellow">
<tr>
<th class="x"> Event Id </th>
<th> Name </th>
<th> Date </th>
<th> Venue </th>
<th> Price </th>
<th> Details </th>
<th> Photo </th>
<th> Sports Type </th>
</tr>

<?php
for ($i=0; $i<count($event); $i++) {
	// echo $id[$i];
	echo "<tr><td>". $event[$i]['id']."</td><td>". $event[$i]['name']."</td><td>". $event[$i]['date']."</td><td>". $event[$i]['venue']."</td><td>". $event[$i]['price']."</td><td>". $event[$i]['details']."</td><td><a href='". $event[$i]['photo']."'>Click me</a></td><td>". $event[$i]['sportsType']."</td>
	</tr>";
	# code..
}
?>



</table>

<?php
	require('includes/foot.php');
?>