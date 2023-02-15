<?php
require_once("../../app.php");
use Techstore\Classes\Models\Order;
if($request->get_has('id')){
    $id = $request->get('id');
}
$ord = new Order;
$ord->update(" status = 'approved' ",$id);
$session->set_session('seccess','order approved');
$request->admin_redirect("order.php");


?>

