<?php
require_once("../../app.php");
use Techstore\Classes\Models\Admin;
use Techstore\Classes\Validation\Validator;

if ($request->post_has("submit")) {
    $email =  $request->post('email');
    $password =  $request->post('password');


    //validation 
    $validator = new Validator;

    $validator->validate('email', $email, ['required','email','max']);
    $validator->validate('password', $password, ['required','str', 'max']);



    if($validator->has_errors()) {
        $session->set_session("errors", $validator->get_errors());
        $request->admin_redirect("login.php");
    } else {
        $ad= new Admin;
        $is_login = $ad->login($email, $password, $session);
        if( $is_login) {
            $request->admin_redirect("index.php");
        } else {
            $session->set_session("errors",['Credentials are not correct']);
            $request->admin_redirect("login.php");
        }

    }
} else {
    $request->admin_redirect("login.php");
}
