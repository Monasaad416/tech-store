<?php
require_once("../../app.php");

use Techstore\Classes\Models\Product;
use Techstore\Classes\File;
use Techstore\Classes\Validation\Validator;

if ($request->post_has("submit")) {
    $id= $request->post('id');
    $name =  $request->post('name');
    $cat_id =  $request->post('cat_id');
    $price =  $request->post('price');
    $pieces =  $request->post('pieces');
    $desc =  $request->post('desc');
    $img =  $request->files('file');


    //validation 
    $validator = new Validator;

    $validator->validate('Product name', $name, ['required', 'str', 'max']);
    $validator->validate('cat_id', $cat_id, ['required', 'numeric']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('pieces number', $pieces, ['required', 'numeric']);
    $validator->validate('Product description', $desc, ['required', 'max']);
    //upload img only if needed it is not required 
    if ($img['error'] == 0) {
        $validator->validate('image', $img, ['image']);
    }

    if ($validator->has_errors()) {
        $session->set_session("errors", $validator->get_errors());
        $request->admin_redirect("edit-product.php");
    } else {
        $pr = new Product;
        $img_name = $pr->select_id($id,"img")['img'];
        // $img_without_ext = pathinfo($img_name,PATHINFO_BASENAME);
        // $img_ext = pathinfo($img['name'],PATHINFO_EXTENSION);
        //in case of upload new img  
        if( $img['error'] == 0 ) {
            unlink(PATH."uploads/$img_name");
            $file = new File($img);
            $img_name =$file->rename()->upload();

        }
        //dp query 
        $pr->update("name='$name',`desc`='$desc',price='$price',pieces_no='$pieces',cat_id='$cat_id',img='$img_name' " , $id);
   
        $session->set_session('success','Product updated successfully');
        $request->admin_redirect('products.php');
    } 
} else {
    $request->redirect("edit-product.php");
}
?>