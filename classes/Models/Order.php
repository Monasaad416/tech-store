<?php

namespace Techstore\Classes\Models;
use Techstore\Classes\Dp;

class Order extends Dp
{
    public function __construct()
    {
        $this->table = "orders";
        $this->connection();
    }

    public function select_all(string $fields = '*') : array
    {
        $query = "SELECT $fields FROM $this->table JOIN order_details JOIN products
        ON $this->table.id = order_details.order_id
        AND order_details.product_id = products.id
        GROUP BY $this->table.id";
        $run_query = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        return mysqli_fetch_all($run_query, MYSQLI_ASSOC);
    }


    public function select_id($id, string $fields = '*')
    {
        $query = "SELECT $fields FROM $this->table JOIN order_details JOIN products
                    ON orders.id = order_details.order_id
                    AND order_details.product_id = products.id
                    WHERE $this->table.id = $id";

        $run_query = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        return mysqli_fetch_assoc($run_query);
    }
}