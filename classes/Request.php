<?php
namespace Techstore\Classes;

class Request
{
    public function get(string $key)
    {
        return $_GET[$key];
    }

    public function post(string $key)
    {
        return $_POST[ $key];
    }
    public function files(string $key)
    {
        return $_FILES[$key];
    }

    public function post_clean(string $key)
    {
        return trim(htmlspecialchars($_POST[$key]));
    }

    public function get_has(string $key) : bool
    {
        // if(isset($_GET[string $key])){
        //     return true;
        // }
        // else {
        //     return false;
        // }
        return isset($_GET[$key]);
    }

    public function post_has(string $key) : bool
    {
        // if(isset($_GET[string $key])){
        //     return true;
        // }
        // else {
        //     return false;
        // }
        return isset($_POST[$key]);
    }

    public function redirect($path)
    {
        header("location:".URL. $path);
    }

    public function admin_redirect($path)
    {
        header("location:" . AURL . $path);
    }

    



}
