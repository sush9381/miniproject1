<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));
    
    $conn=connect();
    $sql="select id from event where aid='".$_SESSION['_login'] ."' && (status='approved' || status='completed')";
    $stmt=$conn->prepare($sql);
    $c=null;
    $c2=null;
    $stmt->execute();
    $id= Array();
    $id=$stmt->fetchall();
    //var_dump($id);
    //die();
    for ($i=0; $i<count($id); $i++){
    $c=$c."".$id[$i]['id']." OR eid=";
    $c2=$c2."".$id[$i]['id']." OR id=";
    }
//var_dump($c);
//die();
if(isset($c)){
$p=strrpos($c, "OR");
//var_dump($p);
    $i=0;
    //$e=str_ireplace(",","'," , $c)
    $c=substr($c, $i,$p);
    $p1=strrpos($c2, "OR");
//var_dump($p);
    $i1=0;
    //$e=str_ireplace(",","'," , $c)
    $c2=substr($c2, $i1,$p1);

    //var_dump($c);
    //die();
$sql="select uid from eventregistered where status='approved' && eid=".$c;
//var_dump($sql);
//die();

//$sql="select id from event where aid='".$_SESSION['_login'] ."' && status='approved'";
    $stmt=$conn->prepare($sql);
    $c1=null;
    $stmt->execute();
    $uid= Array();
    $uid=$stmt->fetchall();
    //var_dump($uid);
    //die();
    for ($i=0; $i<count($uid); $i++){
    $c1=$c1."".$uid[$i]['uid']." OR id=";
    }
if(isset($c1)){
$p=strrpos($c1, "OR");
//var_dump($p);
    $i=0;
    //$e=str_ireplace(",","'," , $c)
    $c1=substr($c1, $i,$p);
    $sql="select * from users where id=".$c1;
//var_dump($sql);
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $uid= Array();
    $uid=$stmt->fetchall();
    //var_dump($uid);
    //die();
    //var_dump($c);
    //die();
    $sql="select * from event where id=".$c2;
//var_dump($sql);
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $eid= Array();
    $eid=$stmt->fetchall();
}
}
    


?>
    <!-- //header -->
    <!-- inner banner -->
    <div class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.php" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Upload Certificate</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="modal-body align-w3">
        <form action="controllers/adminC.php" method="post" class="p-sm-3" enctype="multipart/form-data">


            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Select User</label>
                <select name="uid" required>
                    <?php
                    for ($i=0; $i<count($uid); $i++){  
                    echo "<option value='". $uid[$i]['id'] ."'>"; echo $uid[$i]['id']."-".$uid[$i]['name']."-".$uid[$i]['email'] ."</option>";
             } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Select Event</label>
                <select name="eid" required>
                    <?php
                    for ($i=0; $i<count($eid); $i++){  
                    echo "<option value='". $eid[$i]['id'] ."'>"; echo $eid[$i]['id']."-".$eid[$i]['name']."-".$eid[$i]['sportsType'] ."</option>";
             } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Upload User Certificate</label>
                <input type="file" class="form-control" name="img" id="recipient-name" required>
            </div>

             <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Upload">
            </div>
        </form>
    </div>
    <!-- //login -->

<?php require('includes/foot.php');
?>