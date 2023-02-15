<?php

namespace Techstore\Classes\Models;

use Techstore\Classes\Dp;
use Techstore\Classes\Session;

class Admin extends Dp
{
    public function __construct()
    {
        $this->table = "admins";
        $this->connection();
    }


    public function login (string $email,string $password , Session $session)
    {
        $query = "SELECT * FROM $this->table WHERE email= '$email' LIMIT 1 ";
        $run_query = mysqli_query($this->conn, $query);
        $admin = mysqli_fetch_assoc($run_query); 
        // print_r($admin);
        // return $admin;
        //if admin exist => array,if not=>null 
        if(!empty($admin)) {
            //check hashed password 
            $hashed_Password = $admin['password'];
            //compare hashed $hashed_Password with pw filled by user 
            $is_same = password_verify($password,$hashed_Password);
            if($is_same) {
                //store data in session 
                $session->set_session('admin_id', $admin['id']);
                $session->set_session('admin_name', $admin['name']);
                $session->set_session('admin_email', $admin['email']);
                return true;
            } else {
                return false;
            }
            return false;
        }
        
    }

    public function logout(Session $session) {
        $session->remove_session('admin_id');
        $session->remove_session('admin_name');
        $session->remove_session('admin_email');
    }
}
