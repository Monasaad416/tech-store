<?php
namespace Techstore\Classes\Validation;

class Validator
{
    private $errors = [];

    public function validate(string $name, $value , array $rules)
    {
       foreach  ($rules as $rule) {
            //    if ($rule == 'required') {
            //        $obj = new Required;
            //    } else if ($rule =='numeric') {
            //         $obj = new Numeric;
            //    } else if ($rule == 'max') {
            //         $obj = new Max;
            //    } else if ($rule == 'email') {
            //         $obj = new Email;
            $classNamespace = "Techstore\\Classes\\Validation\\" . $rule;
            $obj = new $classNamespace;
        
  

        $error = $obj->check($name,$value) ;
            if($error !== false )
            {
                $this->errors[] = $error;
          
                break;
            }


       }
    }

    public function get_errors() : array
    {
        return $this->errors;
    }

    public function has_errors () : bool
    {
        // if(empty($errors)) {
        //     return false;
        // } return true;

        return !empty($this->errors);
    }

  
}
