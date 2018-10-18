<?php
namespace daugustson\DataDesign;

require_once(dirname(__DIR__, 2) . "/classes/autoload.php");

use http\Exception\BadQueryStringException;
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
		 * @var string shopCartProductMrfNumID
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
		  * @param string $shopCartProductMrfNumID id of the Mfr part number
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
       		$this->setshopCartProfileID($newshopCartProfileID);
				$this->setshopCartProductMrfNumID($newshopCartProductMrfNumID);
				$this->setshopCartQuantity($newshopCartQuantity);
				$this->setshopCartPartNumber($newshopCartPartNumber);
				$this->setshopCartCustomerReference($newshopCartCustomerReference);
			}
			    //determine what exception type was thrown
			 catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception
			 $exception) {
       		$exceptiontype = get_class($exception);
       		throw(new $exceptiontype($exception->getMessage(), 0, $exception));
			 }
       }
		 /**
		  * accessor method for shopCartProfile ID
		  * @return Unid value of shopCartProfile ID
		  */
	    public function getShopCartProfileID(): Uuid {
		return ($this->shopCartProfileID);
	    }

	    /**
		  * mutator method for shopCartProfile ID
		  * @param Uuid | string $newshopCartProfileID new value of shopCartProfile ID
		  * @throws \ RangeException if $newshopCartProfileID is not positive
		  * @throws \ TypeError if $newshopCartProfileID is not a uuid or string
		  **/
	    public function setshopCartProfileID($newshopCartProfileID) : void {
			 try {
				 $uuid = self::validatedUnid($newshopCartProfileID);
			 } catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception
			 $exception) {

			 }
			 // convert and store for shopCartProfile ID
			 $this->ShopCartProfileID = $uuid;

		 }

	/**
	 * accessor method for shopCartProductMrfNum ID
	 * @return string value of shopCartProductMrfNum ID
	 */
	public function shopCartProductMrfNumID(): string{
		return ($this->shopCartProductMrfNumID);
	}

	/** mutator method for shopCartProductMrfNumID
	 * @param string $newshopCartProductMrfNumID new value of Product part Number
	 * @throws \InvalidArgumentException if $newshopCartProductMrfNumID is not a string or insecure
	 * @throws \RangeException if $newshopCartProductMrfNumID is >64 characters
	 *
	 */
	/**
	 * @param string $shopCartProductMrfNumID
	 */
	public function setShopCartProductMrfNumID(string $newshopCartProductMrfNumID) {
		// verify the setShopCartProductMrfNumID content is secure
		$newshopCartProductMrfNumID = trim($newshopCartProductMrfNumID);
		$newshopCartProductMrfNumID = filter_var($newshopCartProductMrfNumID, filter_sanitize_string,
			filter_flag_no_encode_quote);
		if(empty($newshopCartProductMrfNumID) === true) {
			throw(new \InvalidArgumentException ("Part number content is empty or insecure"));
		}
		//verify the mrf number will fit in the datebase
		if(strlen($newshopCartProductMrfNumID)>= 64){
			throw(new \RangeException("Mrf part number is to long"));
		}

		//* store the Mrf part number
		$this->shopCartProductMrfNumID = $newshopCartProductMrfNumID;



	}












}

