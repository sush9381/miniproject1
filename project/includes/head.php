<?php
	session_start();
    require(__DIR__.'\..\config\helper.php');
	//var_dump($_SESSION['_login']);
    //var_dump($_SESSION['type']);
?>
<html>

<head>
    <title>Event-O-Pedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Intense Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />

    <!-- Custom Theme files -->
     <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    -->
   
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
</head>
<body>
    <!-- header -->
    <header id="home">
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-sm-3 py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <a><h1 >Event-O-Pedia</h1></a>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            
                        <?php
                                if(isset($_SESSION['_login'])){
                                    if($_SESSION['type']=="user"){
                        ?>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="user_certificate.php">Certificates</a></li>
                                    <li><a href="validation_certificate.php">Upload <br> Certificates</a></li>
                                    <li><a href="events.php">Events</a></li>
                                    <li><a href="eventregistered.php">Events <br> Registered</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li class="nav-right-sty mt-lg-0 mt-sm-4 mt-3">
                                        <a href="controllers/logout.php" class="reqe-button text-uppercase">Logout</a>
                                    </li>

                        <?php
                                    }elseif($_SESSION['type']=="admin"){
                        ?>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="eventstatus.php">Event<br>Status</a></li>
                                        <li><a href="createEvent.php">Create <br> Event</a></li>
                                        <li><a href="adminCertificate.php">Upload <br> Certificates</a></li>
                                        <li><a href="approve.php">Approve <br> Participants</a></li>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li class="nav-right-sty mt-lg-0 mt-sm-4 mt-3">
                                          <a href="controllers/logout.php" class="reqe-button text-uppercase">Logout</a>
                                        </li>
                        <?php
                                    }

                                }
                                else{
                        ?>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li class="nav-right-sty mt-lg-0 mt-sm-4 mt-3">
                               <a href="login.php" class="reqe-button text-uppercase">Login</a>
                                <a href="register.php" class="reqe-button text-uppercase">Register</a>
                            </li>
                            <?php
                        }
                            ?>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>

    <?php
    //var_dump($_SESSION['flash']);

   
    
if(isset($_SESSION['flash'])){
    $flash=$_SESSION['flash'];
echo "<div class='text-center alert alert-".$flash['level']."'>
    <strong>".$flash['level']." 
    </strong>";
     echo $flash['message']; 
echo "</div>"
?>
<?php unset($_SESSION['flash']);
}

 if(isset($_SESSION['errors'])){
        $errors=$_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    if(isset($_SESSION['values'])){
        $errors=$_SESSION['values'];
        unset($_SESSION['values']);
    }
?>