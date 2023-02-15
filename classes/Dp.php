<?php
namespace Techstore\Classes;

abstract class Dp 
{
    protected $conn;
    protected $table;
    public function connection ()
    {
       $this->conn =  mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }


    public function select_all (string $fields ='*') :array
    {
        $query = "SELECT $fields FROM $this->table";
        $run_query = mysqli_query($this->conn , $query);
        return mysqli_fetch_all($run_query,MYSQLI_ASSOC);
    }

    public function select_id($id , string $fields = '*') 
    {
        $query = "SELECT $fields FROM $this->table WHERE id = $id";
        $run_query = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($run_query);
    }
    public function select_prods_cats(string $fields = '*'): array
    {
        $query = "SELECT $fields FROM $this->table JOIN cats";
        $run_query = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($run_query, MYSQLI_ASSOC);
    }
    public function select_where($conditions , string $fields = '*')
    {
        $query = "SELECT $fields FROM $this->table WHERE $conditions";
        $run_query = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($run_query, MYSQLI_ASSOC);
    }

    public function get_count() :int 
     {
        $query = "SELECT count(*) AS cnt FROM $this->table";
        $run_query = mysqli_query($this->conn , $query);
        return mysqli_fetch_assoc($run_query)['cnt'];
    }

    public function insert (string $fields,string $values) :bool
    {
        $query = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return mysqli_query($this->conn, $query);
    }

    public function insert_and_get_id(string $fields,string $values)
    {
        $query = "INSERT INTO $this->table ($fields) VALUES ($values)";
         mysqli_query($this->conn, $query);
         return mysqli_insert_id($this->conn);
    }

    public function update(string $sets, $id): bool
    {
        $query = "UPDATE $this->table SET $sets WHERE id = $id ";
        return mysqli_query($this->conn, $query);
    }

    public function delete($id): bool
    {
        $query = "DELETE FROM $this->table WHERE id = $id ";
        return mysqli_query($this->conn, $query);
    }
}

