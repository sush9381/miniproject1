<?php require('includes/head.php');
require('controllers/secure.php');
//require(__DIR__.'\config\helper.php');
require(rootDir('/eventopedia/config/connect.php'));

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
            <li class="breadcrumb-item active" aria-current="page">Validation Certificate</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="modal-body align-w3">
        <form action="controllers/userC.php" method="post" class="p-sm-3" enctype="multipart/form-data">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Upload your Certificate</label>
                <input type="file" class="form-control" name="img" id="recipient-name" required>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Select Level at which you played</label>
                <select name="level" required>
                    <option value="Inter-College" selected>Inter-College</option>
                    <option value="Regional" >Regional Level</option>
                    <option value="State" >State Level</option>
                    <option value="National" >National level</option>
                </select>
            </div>
<?php
           // $stmt= $conn->prepare("select id,name from event where aid = :value");
             //           $stmt->bindParam(':value',$value);
               //         $value = $_SESSION['_login'];
?>
             <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Upload">
            </div>
        </form>
    </div>
    <!-- //login -->

<?php require('includes/foot.php');
?>