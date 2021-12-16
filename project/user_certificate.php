<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));

	$conn=connect();
	$sql="select * from user_c where uid='".$_SESSION['_login']."'";
	//var_dump($sql);
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$cer= Array();
	$cer=$stmt->fetchall();
	$c=null;

  //  var_dump($id);
    //die();
    for ($i=0; $i<count($cer); $i++){
    $c=$c."".$cer[$i]['eid']." OR id=";
	}
if(isset($c)){
$p=strrpos($c, "OR");
//var_dump($p);
    $i=0;
    //$e=str_ireplace(",","'," , $c)
    $c=substr($c, $i,$p);
	$sql="select * from event where status='approved' && id='".$c."'";
//var_dump($sql);
//die();

//$sql="select id from event where aid='".$_SESSION['_login'] ."' && status='approved'";
	//$eid=null;
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $eid= Array();
    $eid=$stmt->fetchall();
    //var_dump(count($eid));

    //die();
	//var_dump($cer);
	//die();
	//$lid=$stmt->fetch();
	//var_dump($lid);
	 //var_dump($_SESSION['_login']);
	//die();


//$stmt=$conn->prepare("SELECT case_id, client_id, status FROM cases WHERE `l_id`=".$lid['l_id']." AND `status`='pending' ");	
//$stmt->execute($_SESSION);
//$id=Array();
//$id=$stmt->fetchall();
}
?>
<font size="4" color="green" face="Comic Sans MS">
<table  border="0" align="center" height=150 width=400 cellpadding=30 cellspacing="1" bgcolor="yellow">
<tr>
<th class="x">Event Id</th>
<th> Name </th>
<th> Sports Type </th>
<th> Certificate </th>
</tr>

<?php
if(isset($eid)){
if(count($eid)>0){
for ($i=0; $i<count($cer); $i++) {
	// echo $id[$i];
	echo "<tr><td>". $eid[$i]['id']."</td><td>". $eid[$i]['name']."</td><td>". $eid[$i]['sportsType']."</td><td><a href='".$cer[$i]['location']."'>Certificate</a></td>
	</tr>";
	# code..
}
}
}
?>



</table>

<?php
	require('includes/foot.php');
?>