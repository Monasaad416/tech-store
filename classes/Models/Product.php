<?php
namespace Techstore\Classes\Models;
use Techstore\Classes\Dp;

class Product extends Dp{
    public function __construct()
    {
        $this->table = "products";
        $this->connection();
    }



    public function select_id($id, string $fields = 'products.*')
    {
        $query = "SELECT $fields FROM $this->table JOIN cats
          ON $this->table.cat_id = cats.id
          WHERE $this->table.id = $id";
        $run_query = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($run_query);
    }

    public function select_all_prodcats(string $fields = '*'): array
    {
        $query = "SELECT $fields FROM $this->table JOIN cats ON $this->table.cat_id = cats.id ORDER BY $this->table.id ASC";
        $run_query = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($run_query, MYSQLI_ASSOC);
    }
}