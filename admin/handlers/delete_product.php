<?php
require_once("../../app.php");
use Techstore\Classes\Models\Product;
$pr = new Product;

if($request->get_has("id")){
    $id = $request->get("id");

    //delete uploaded image first 
    $prod = $pr ->select_id($id,"img");
    $img_name = $prod['img'];
    unlink(PATH."uploads/".$img_name);
    // print_r($prod);
    // die();

    $pr->delete($id);

    $session->set_session("success", "Product deleted successfully");
    $request->admin_redirect("products.php");
}
?>


