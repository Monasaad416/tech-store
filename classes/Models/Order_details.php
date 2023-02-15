<?php

namespace Techstore\Classes\Models;

use Techstore\Classes\Dp;

class Order_details extends Dp
{
    public function __construct()
    {
        $this->table = "order_details";
        $this->connection();
    }

    public function select_with_products($ord_id)
    {
        $query = "SELECT qty,name,price FROM $this->table JOIN products
        ON $this->table.product_id = products.id
        WHERE order_id = $ord_id";
        $run_query = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        
        return mysqli_fetch_all($run_query,MYSQLI_ASSOC);

    }


}
