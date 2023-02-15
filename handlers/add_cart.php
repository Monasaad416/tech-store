<?php
require_once("../app.php");
use Techstore\Classes\Cart;

if ( $request->post_has('submit')) {
    $id = $request->post("id");
    $qty = $request->post("qty");
    $name = $request->post("name");
    $price = $request->post("price");
    $img = $request->post("img");

    $prodData = [
        'qty' => $qty,
        'name' =>$name,
        'price' => $price,
        'img' => $img
    ];

    $cart = new Cart;
    $cart->add($id,$prodData);
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    // print_r($_POST);
    $request->redirect("products.php");
}

?>