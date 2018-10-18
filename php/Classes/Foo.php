<?php
namespace daugustson\DataDesign;

require_once(dirname(__DIR__, 2) . "/classes/autoload.php");

use Ramsey\Uuid\Uuid;


class shopping_cart {
      /**
		 * *this ID for the shopCartProfile:
		 * this is a foreign key that is references to
		 * profile(profileID)
		 * @var Uuid shopCartProfileID
		 */
      private $shopCartProfileID;
      /**
		 * this ID is for the shopCartProductMrfNum:
		 *this is a foreign key that is references to
		 *product(productMrfNumID)
		 * @var Uuid shopCartProductMrfNumID
		 */
      private $shopCartProductMrfNumID;
      /**
		 * this is the quantity of product in the shopping cart
		 * @var string
		 */
      private $shopCartQuantity;
	/**
	 * this is the part number for the product in the shopping cart
	 * @var string
	 */
	    private $shopCartPartNumber;
	/**
	 *this is the customer reference for this order.
	 * @var string
	 */
       private $shopCartCustomerReference;

       /**
		  * @param string|uuid $shopCartProfileID id of the profile ID
		  * @param string|uuid $shopCartProductMrfNumID id of the Mfr part number
		  * @param string $shopCartQuantity string amount of product in shopping cart
		  * @param string $shopCartPartNumber string digkey part/config you have in your cart
		  * @param string $shopCartCustomerReference string customer order ref number
		  * @throws \InvalidArgumentException if data types are not valid
		  * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
		  * @throws \TypeError if data types violate type hints
		  * @throws \Exception if some other exception occurs
		  */
       public function _construct($shopCartProfileID, $shopCartProductMrfNumID, $shopCartQuantity,
											 $shopCartPartNumber, $shopCartCustomerReference){
       	try {
       		$this->setshopCartProfileID($shopCartProfileID);
				$this->setshopCartProductMrfNumID($shopCartProductMrfNumID);
				$this->setshopCartQuantity($shopCartQuantity);
				$this->setshopCartPartNumber($shopCartPartNumber);
				$this->setshopCartCustomerReference($shopCartCustomerReference);
			}
			    //determine what exception type was thrown
			 catch(\InvalidArgumentException | \RangeException | \TypeError | \xception
			 $exception)

		 }





}

