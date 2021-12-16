<?php
session_start();
require(__DIR__.'\..\config\helper.php');
logout();
flash('success','You are successfully logged out');
redirectTo(localhost('login.php'));

?>