<?php
namespace Techstore\Classes\Validation;

class Email implements ValidationRule
{
    public function check(string $name, $value)
    {
        if (!filter_var($value,FILTER_VALIDATE_EMAIL)) {
            return "$name must be a valid email";
        }
        return false;
    }
}
