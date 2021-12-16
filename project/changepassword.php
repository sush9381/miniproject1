<?php require('includes/head.php');
require('controllers/secure.php');

?>
    <!-- //header -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.php" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="modal-body align-w3">
        <form action="controllers/changep.php" method="post" class="p-sm-3">

            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Old Password</label>
                <input type="password" class="form-control" placeholder="*****" name="password" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">New Password</label>
                <input type="password" class="form-control" placeholder="*****" name="newp" id="password" required>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="*****" name="newp1" id="password" required>
            </div>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Change Password">
            </div>

        </form>
    </div>

<?php require('includes/foot.php');
?>