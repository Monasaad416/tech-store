<?php

// require("classes/Request.php");
// require("classes/Session.php");
// require("classes/Dp.php");
// require("classes/Models/Product.php");
// require("classes/Models/Order.php");
// require("classes/Validation/Validatio_Rule.php");
// require("classes/Validation/Validator.php");
// require("classes/Validation/Required.php");
// require("classes/Validation/Numeric.php");
// require("classes/Validation/Str.php");
// require("classes/Validation/Max.php");
// require("classes/Validation/Email.php");


require_once("app.php");

// $r = new Request;

// echo $r->get('name');

// $s = new Session;
// $s->set_session("name","mona");

// echo $s->get_session("name");

// print_r($_SESSION);

// $prod = new Product();
// $res = $prod->select_all("id,name,`desc`");
// echo'<pre>';
// print_r($res);
// echo '</pre>';

// $prodId = $prod->select_id(29);
// echo '<pre>';
// print_r($prodId);
// echo '</pre>';

// $prodSelect = $prod->select_where("id > 10 AND price < 600");
// echo '<pre>';
// print_r($prodSelect);
// echo '</pre>';

// $order = new Order();
// $res = $order->select_all();
// echo '<pre>';
// print_r($res);
// echo '</pre>';


// $prod_count = $prod->get_count()['cnt'];
// echo '<pre>';
// print_r($prod_count);
// echo '</pre>';

// use Techstore\Classes\Models\Order;
// use Techstore\Classes\Models\Order_details;
// $order = new Order();
// $ord_details = new Order_details();

// $order_count = $order->get_count();

// $result = $order->insert("name , phone" , " 'saad' , '024566433' ");
// $id = $order->insert_and_get_id("name , phone", " 'saad' , '024566433' ");
// $ord_details->insert("order_id,product_id,qty,", "'$id','30','5");
// echo '<pre>';
// var_dump ($result);
// echo($id);
// echo '</pre>';

// $update_order = $order->update(" name = 'mona saad ibrahim'  , email = 'mmm@mm.com' " , 2);

// $delete_order = $order->delete(5);
// require_once("app.php");
// use Techstore\Classes\Validation\Validator;
// $val = new Validator;
// $val->validate('age','dddd',['required','numeric']);
// echo '<pre>';
// var_dump($val->get_errors());
// echo '</pre>';




//  echo $request->get("name");
// echo $session->has_session("error");

// use Techstore\Classes\Cart;
// $cart = new Cart;
// echo  $cart->total();

// use Techstore\Classes\Models\Admin;
// $ad = new Admin;
// $admin=$ad->login("mrmr@admin.com","123545",$session);
// echo '<pre>';
// // var_dump($admin);
// print_r($_SESSION);
// echo '</pre>';


// $logout = $ad->logout($session);
// echo '<pre>';
// var_dump($logout);
// print_r($_SESSION);
// echo '</pre>';



use Techstore\Classes\Models\Order;

$or = new Order;
$order = $or->select_id(48,"orders.id,orders.name,orders.phone,orders.status,orders.created_at,SUM(qty*price) AS total");

echo '<pre>';
// var_dump($admin);
print_r($order);
echo '</pre>';




