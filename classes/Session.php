<?php
namespace Techstore\Classes;
class Session
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    }
    
    public function set_session(string $key,$value) {
        $_SESSION[$key] = $value;
    }

    public function get_session(string $key)
    {
        return $_SESSION[$key];
    }

    public function has_session(string $key) :bool
    {
        return isset($_SESSION[$key]);
    }

    public function remove_session(string $key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy_session(string $key)
    {
        $_SESSION = [] ;
        session_destroy();
    }
}