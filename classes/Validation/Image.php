<?php

namespace Techstore\Classes\Validation;

class Image implements ValidationRule
{
    public function check(string $name, $value)
    {
        $allowed_ext = ['png','jpg','jpeg','gif'];
        $ext = pathinfo($value['name'],PATHINFO_EXTENSION);
        if (! in_array($ext, $allowed_ext)) {
            return "Image extension not allowed please upload .png,.jpg,.jpeg,.gif";
        }
        return false;
    }
}
