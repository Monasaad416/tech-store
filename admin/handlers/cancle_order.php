<?php
require_once("../../app.php");
use Techstore\Classes\Models\Order;
if($request->get_has('id')){
    $id = $request->get('id');
}
$ord = new Order;
$ord->update(" status = 'cancled' ",$id);
$session->set_session('seccess','order cancled');
$request->admin_redirect("order.php?id=$id");
