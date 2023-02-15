<?php

namespace Techstore\Classes\Validation;

class Required_file implements ValidationRule
{
    public function check(string $name, $value)
    {
        if($value['error'] !=0 ) {
            return "$name is required";
        }
        return false;
    }
}
