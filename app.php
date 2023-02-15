<?php

use Techstore\Classes\Request;
use Techstore\Classes\Session;

// path $urls 
// $path = D:/xampp/htdocs/Techstore; or use __DIR__ to get current directory of app  which is same directort of prpject 



define("PATH" , __DIR__ . "/");
define("APATH", __DIR__ . "/admin/");
define("URL", "http://localhost/Techstore/");
define("AURL", "http://localhost/Techstore/admin/");

//dp credentials 
define("DB_SERVERNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","Techstore");



//include classes

// require_once(PATH . "classes/Request.php");
// require_once(PATH . "classes/Session.php");
// require_once(PATH . "classes/Dp.php");
// require_once(PATH . "classes/Models/Cat.php");
// require_once(PATH . "classes/Models/Order.php");
// require_once(PATH . "classes/Models/Product.php");
// require_once(PATH . "classes/Validation/Validatio_Rule.php");
// require_once(PATH . "classes/Validation/Validator.php");
// require_once(PATH . "classes/Validation//Required.php");
// require_once(PATH . "classes/Validation/Numeric.php");
// require_once(PATH . "classes/Validation/Str.php");
// require_once(PATH . "classes/Validation/Max.php");
// require_once(PATH . "classes/Validation/Email.php");
require_once(PATH . "vendor/autoload.php");


//objects 


$request = new Request;
$session = new Session;