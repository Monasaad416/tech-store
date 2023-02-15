<?php 

require_once("../../app.php");

use Techstore\Classes\Models\Admin;

$admin = new Admin;
$admin->logout($session);
$request->admin_redirect("login.php");