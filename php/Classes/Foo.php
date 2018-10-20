<?php
namespace daugustson\datadesign;

require_once(dirname(__DIR__, 2) . "/classes/autoload.php");


use Ramsey\Uuid\Uuid;


class shopping_cart  {
	use ValidateUuid;
	use ValidateDate;

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
		  * @param string|Uuid $shopCartProfileID id of the profile ID
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
		  * @return Uuid value of shopCartProfile ID
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
	public function getshopCartProductMrfNumID(): string{
		return ($this->shopCartProductMrfNumID);
	}

	/** mutator method for shopCartProductMrfNumID
	 * @param string $newshopCartProductMrfNumID new value of Product part Number
	 * @throws \InvalidArgumentException if $newshopCartProductMrfNumID is not a string or insecure
	 * @throws \RangeException if $newshopCartProductMrfNumID is >64 characters
	 */
	public function setshopCartProductMrfNumID(string $newshopCartProductMrfNumID): void {
		// verify the setShopCartProductMrfNumID content is secure
		$newshopCartProductMrfNumID = trim($newshopCartProductMrfNumID);
		$newshopCartProductMrfNumID = filter_var($newshopCartProductMrfNumID, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
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

	/**
	 * accessor method for shop Cart Quantity
	 * @return string value of shopCartQuantity
	 */
	public function getshopCartQuantity(): string {
		return ($this->shopCartQuantity);
	}

	/** mutator method for shopCartProductMrfNumID
	 * @param string $newshopCartQuantity new value of Product Mrf part Number
	 * @throws \InvalidArgumentException if $newshopCartQuantity is not a string or insecure
	 * @throws \RangeException if $newshopCartQuantity is >16 characters
	 */
	public function setShopCartQuantity(string $newshopCartQuantity): void {
		// verify the quantity is secure
		$newshopCartQuantity = trim($newshopCartQuantity);
		$newshopCartQuantity = filter_var($newshopCartQuantity, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
      if(empty($newshopCartQuantity) === true) {
      	throw (new \InvalidArgumentException(" Specify quantity need"));
		}

		// verify the quantity content will fit in the database
		if(strlen($newshopCartQuantity) >= 16) {
			throw(new \RangeException("quantity is to large contact digikey"));
		}
		//store shopCartQuantity content
		$this->shopCartQuantity = $newshopCartQuantity;
	}

	/**
	 * accessor method for shop Cart part number
	 * @return string value of shopCartPartNumber
	 */
	public function getshopCartPartNumber(): string {
		return ($this->shopCartPartNumber);
	}

	/** mutator method for shopCartPartNumber
	 * @param string $newshopCartPartNumber new value of shop Cart digkey Part Number
	 * @throws \InvalidArgumentException if $newshopCartQuantity is not a string or insecure
	 * @throws \RangeException if $newshopCartPartNumber is >16 characters
	 */
	public function setShopCartPartNumber(string $newshopCartPartNumber) : void {
		//verify the shop cart part number
		$newShopCartPartNumber = trim($newshopCartPartNumber);
		$newShopCartPartNumber = filter_var($newShopCartPartNumber, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newshopCartPartNumber) ===true){
			throw(new \InvalidArgumentException("Enter part number"));
		}

		//verify the shop cart part number will fit in the date base
		if(strlen($newshopCartPartNumber) >= 16){
			throw(new \RangeException("part number is too long"));
		}
		//store the part number
		$this->shopCartPartNumber = $newshopCartPartNumber;
	}


	/**
	 * accessor method for shop Cart Customer Ref number
	 * @return string value of  shopCartCustomerReferenc
	 */
	public function getshopCartCustomerReference(): string {
		return ($this-> shopCartCustomerReference);
	}

	/** mutator method for  shopCartCustomerReference
	 * @param string $newshopCartCustomerReference new value of customer Ref number
	 * @throws \InvalidArgumentException if $newshopCartCustomerReference is not a string or insecure
	 * @throws \RangeException if $newshopCartCustomerReference is >64 characters
	 */
	public function setshopCartCustomerReference(string $newshopCartCustomerReference) : void {
		//verify the customer reference number
		$newshopCartCustomerReference = trim($newshopCartCustomerReference);
		$newshopCartCustomerReference = filter_var($newshopCartCustomerReference, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($$newshopCartCustomerReference) ===true){
			throw(new \InvalidArgumentException("Need Reference number"));
		}

		//verify the shop cart part number will fit in the date base
		if(strlen($$newshopCartCustomerReference) >= 64){
			throw(new \RangeException("part number is too long"));
		}
		//store the part number
		$this->shopCartPartNumber = $$newshopCartCustomerReference;
	}
}

