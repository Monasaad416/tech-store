<?php
require_once("../../app.php");

use Techstore\Classes\Models\Admin;
use Techstore\Classes\Validation\Validator;

if ($request->post_has("submit")) {
    $name =  $request->post('name');
    $email =  $request->post('email');
    $password =  $request->post('password');
    $confirm_password =  $request->post('confirm_password');


    //validation 
    $validator = new Validator;

    $validator->validate('name', $name, ['required','str', 'max']);
    $validator->validate('email', $email, ['required','email', 'max']);

    if(!empty($password) && $password == $confirm_password) {
        $validator->validate('password', $password, ['required','str','max']);
    }



    if ($validator->has_errors()) {
        $session->set_session("errors", $validator->get_errors());
        $request->admin_redirect("profile.php");
    } else {
        $ad = new Admin;
        if (!empty ($password)) {
            //update query with password 
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $ad->update(" name ='$name' ,email ='$email' ,`password`= '$hashed_password' "  ,$session->get_session('admin_id'));

        } else {
            //update query without password 
            $ad->update(" name ='$name' , email = '$email' ", $session->get_session('admin_id'));
        }
        $session->set_session("success","profile edited successfully");
        $request->admin_redirect("handlers/handle_logout.php");
    }
} else {
    $request->admin_redirect("login.php");
}
