<?php

namespace Techstore\Classes\Models;
use Techstore\Classes\Dp;

class Cat extends Dp
{
    public function __construct()
    {
        $this->table = "cats";
        $this->connection();
    }
}
