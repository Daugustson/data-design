<?php
namespace daugustson\datadesign;


require_once(dirname(__DIR__). "/Classes/ShoppingCart.php");


use Ramsey\Uuid\Uuid;


$shoppingCart = new ShoppingCart(234, 54345, 23,
	33, 32);

var_dump($shoppingCart);


?>



