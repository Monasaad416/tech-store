<?php
require_once("../app.php");
use Techstore\Classes\Cart;
use Techstore\Classes\Models\Order;
use Techstore\Classes\Models\Order_details;
use Techstore\Classes\Validation\Validator;

$cart = new Cart;

if ($request->post_has("submit") && $cart->count() !== 0) {
    $name =  $request->post('name');
    $email =  $request->post('email');
    $phone =  $request->post('phone');
    $address =  $request->post('address');


    //validation 
    $validator = new Validator;
    $validator->validate('name',$name,['required','str','max']);
    if (!empty($email)) {
    $validator->validate('email', $email, ['email','max']);
    $email = " '$email' ";
    } else {
        $email = "NULL";
    }
    $validator->validate('phone', $phone, ['required','str', 'max']);

    if (!empty($address)) {
    $validator->validate('address', $address, ['str', 'max']);
        $address = " '$address' ";
    } else {
        $address = "NULL";
    }



    if($validator->has_errors()) {
        $session->set_session("errors", $validator->get_errors());
        $request->redirect("cart.php");
    } else {
        $ord = new Order;
        $ord_details = new Order_details;
        $cart = new Cart();

        $order_id = $ord->insert_and_get_id("name, email, phone, address", " '$name',$email,'$phone',$address");
        foreach ($cart->all_in_cart() as $prod_id => $Prod_data) {
            $qty = $Prod_data['qty'];
            $ord_details->insert("order_id, product_id, qty","'$order_id','$prod_id','$qty'");
            // echo "order id:$order_id product id:$prod_id";
            // print_r($ord);

        }
        $cart->empty();
       $request->redirect("products.php");

    }
} else {
    $request->redirect(("products.php"));
}

?>

