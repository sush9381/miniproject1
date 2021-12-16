<?php require('includes/head.php');

?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="index.php" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="modal-body align-w3">
        <form action="controllers/loginuser.php" method="post" class="p-sm-3">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Login Type</label>
                <select name="type" required>
                    <option value="admin">Admin</option>
                    <option value="user" selected>User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Username</label>
                <input type="email" class="form-control" placeholder="someone@gmail.com" name="email" id="recipient-name"
                    required>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" class="form-control" placeholder="*****" name="password" id="password" required>
            </div>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Login">
            </div>
            <p class="text-center dont-do text-secondary">Don't have an account?
                <a href="register.php" class="text-theme-2 font-weight-bold">
                    Register Now</a>
            </p>
        </form>
    </div>
    <!-- //login -->

<?php require('includes/foot.php');
?>