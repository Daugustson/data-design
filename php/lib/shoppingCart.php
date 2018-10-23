<?php
namespace daugustson\datadesign;


require_once(dirname(__DIR__). "/Classes/ShoppingCart.php");


use Ramsey\Uuid\Uuid;


$shoppingCart = new ShoppingCart("faa2ebca-2138-42eb-b806-09f709343401", 453, 23,
	33, 32);

var_dump($shoppingCart);






?>



