<?php require('includes/head.php');

?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.php" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- register  -->
    <div class="modal-body align-w3">
        <form action="controllers/registeruser.php" method="post" class="p-sm-3">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Registration Type</label>
                <select name="type" required>
                    <option value="admin" <?php if(isset($_SESSION['value']['type'])){
                        if($_SESSION['value']['type']=='admin')
                        echo "selected"; }?> >Admin</option>
                    <option value="user" <?php if(isset($_SESSION['value']['type'])){
                        if($_SESSION['value']['type']=='user')
                        echo "selected";    } ?> >User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text" class="form-control" placeholder="your name" name="name" id="recipient-name"
                    <?php if(isset($_SESSION['value']['name'])){
                    echo "value='".$_SESSION['value']['name']."'";
                } ?>
                    required>
            </div>
            <div class="form-group">
                <label for="recipient-dob" class="col-form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="recipient-name" 
                <?php if(isset($_SESSION['value']['dob'])){
                    echo "value='".$_SESSION['value']['dob']."'";
                } ?>
                    required>
            </div>
            <label for="recipient-gender" class="col-form-label">Gender</label>
                <select name="gender" required>
                    <option value="m" <?php if(isset($_SESSION['value']['gender'])){
                        if($_SESSION['value']['gender']=='m')
                        echo "selected";
                        } ?> >Male</option>
                    <option value="f" <?php if(isset($_SESSION['value']['gender'])){
                        if($_SESSION['value']['gender']=='f')
                        echo "selected";
                        } ?> >Female</option>
                    <option value="o" <?php if(isset($_SESSION['value']['gender'])){
                        if($_SESSION['value']['gender']=='o')
                        echo "selected";
                        } ?> >Others</option>
                </select>
            <div class="form-group">
                <label for="recipient-contact" class="col-form-label">Contact Number</label>
                <input type="number" class="form-control" placeholder="95965xxxxx" name="contact" id="recipient-name"
                   <?php if(isset($_SESSION['value']['contact'])){
                    echo "value='".$_SESSION['value']['contact']."'";
                } ?>
                    required>
                    <?php 
                    //var_dump($errors);
                    //var_dump($_SESSION['value']);
                    //var_dump($_SESSION['error']);
                    if(isset($_SESSION['error']['contact'])){
                    echo "<p class='red'>*".$_SESSION['error']['contact']."</p>";
                }
                         ?>
            </div>
            <div class="form-group">
                <label for="recipient-email" class="col-form-label">Email</label>
                <input type="email" class="form-control" placeholder="someone@email.com" name="email" id="recipient-email"
                  <?php if(isset($_SESSION['value']['email'])){
                    echo "value='".$_SESSION['value']['email']."'";
                } ?>
                    required>
                    <?php
                    if(isset($_SESSION['error']['email'])){
                    echo "<p class='red'>*".$_SESSION['error']['email']."</p>";
                }
                         ?>
            </div>
            <div class="form-group">
                <label for="password1" class="col-form-label">Password</label>
                <input type="password" class="form-control" placeholder="******" name="password" id="password1"
                    required>
                    <?php
                    if(isset($_SESSION['error']['password'])){
                    echo "<p class='red'>*".$_SESSION['error']['password']."</p>";
                }
                         ?>
            </div>
            <div class="form-group">
                <label for="password2" class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="******" name="password1" id="password2"
                    required>
                    <?php
                    if(isset($_SESSION['error']['password1'])){
                    echo "<p class='red'>*".$_SESSION['error']['password1']."</p>";
                }
                         ?>
            </div>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Register">
            </div>
        </form>
    </div>
    <!-- //register -->

<?php require('includes/foot.php');
?>