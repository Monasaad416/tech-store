<?php
namespace Techstore\Classes;

class Cart 
{
    public function add(string $id , array $prodData) {
     
        $_SESSION['cart'][$id] = $prodData;  
    }
    public function count()
    {
        if (!empty ($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        }
    }

    public function total() 
    {
        $total = 0;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $prodData) {
            $total += $prodData['qty'] * $prodData['price'];
            }
        }
        
        return $total;
    }


    public function has(string $id) :bool 
    {
        if (!empty($_SESSION['cart'])) {
            return array_key_exists($id,$_SESSION['cart']);
        } else {
            return false;
        }
    }


    public function all_in_cart()
    {
        if (!empty($_SESSION['cart'])) {
            return $_SESSION['cart'];
        } 
         
    }

    public function remove_from_cart ($id)
    {
        unset($_SESSION['cart'][$id]);
    }

    public function empty()
    {
        $_SESSION['cart'] = [];
    }
}