<?php
require_once("../../app.php");

use Techstore\Classes\Models\Product;
use Techstore\Classes\File;
use Techstore\Classes\Validation\Validator;

if ($request->post_has("submit")) {
    $name =  $request->post('name');
    $cat_id =  $request->post('cat_id');
    $price =  $request->post('price');
    $pieces =  $request->post('pieces');
    $desc =  $request->post('desc');
    $img =  $request->files('img');


    //validation 
    $validator = new Validator;

    $validator->validate('Product name', $name, ['required', 'str', 'max']);
    $validator->validate('cat_id', $cat_id, ['required', 'numeric']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('pieces number', $pieces, ['required', 'numeric']);
    $validator->validate('Product description', $desc, ['required', 'max']);
    $validator->validate('image', $img, ['required_file', 'image']);






    if ($validator->has_errors()) {
        $session->set_session("errors", $validator->get_errors());
        $request->admin_redirect("add-product.php");
    } else {
        //upload img  
        $file = new File($img);
        $img_uploaded_name = $file->rename()->upload();


        $session->set_session('success','Product added successfully');
        $request->admin_redirect('products.php');

        //dp query 
        $pr = new Product;
        $pr->insert(
            " name, `desc`, price,pieces_no,img,cat_id ",
        " '$name','$desc','$price','$pieces','$img_uploaded_name','$cat_id' "
        );

        $session->set_session('success', 'Product added successfully');
        $request->admin_redirect('products.php');
    } 
} else {
    $request->redirect("add-product.php");
}
?>
