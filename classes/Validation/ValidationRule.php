<?php
namespace Techstore\Classes\Validation;

interface ValidationRule 
{
    public function check(string $name, $value);
}