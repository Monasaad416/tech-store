<?php
namespace Techstore\Classes\Validation;

class Max implements ValidationRule
{
    public function check(string $name, $value)
    {
        if (strlen($name) > 255 ) {
            return "$name must noit excced 255 character";
        }
        return false;
    }
}
