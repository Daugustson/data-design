<?php
namespace daugustson\datadesign;


require_once(dirname(__DIR__). "/Classes/ShoppingCart.php");


use Ramsey\Uuid\Uuid;


$shoppingCart = new ShoppingCart(0, 54345, 23,
	34, 32432);

var_dump($shoppingCart);


?>



