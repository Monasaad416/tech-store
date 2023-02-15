<?php
require_once("../app.php");
use Techstore\Classes\Cart;

if ( $request->get('id')) {
    $id = $request->get("id");


    $prodData = [
        'qty' => $qty,
        'name' =>$name,
        'price' => $price,
        'img' => $img
    ];

    $cart = new Cart;
    $cart->remove_from_cart($id);
    $request->redirect("cart.php");
}
