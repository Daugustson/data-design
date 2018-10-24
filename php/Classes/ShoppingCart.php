<?php
namespace daugustson\datadesign;

require_once("autoload.php");
require_once(dirname(__DIR__,2). "/vendor/autoload.php");


use Ramsey\Uuid\Uuid;


class ShoppingCart {
	use ValidateUuid;


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
       public function __construct($newShopCartProfileID, $newShopCartProductMrfNumID, $newShopCartQuantity,
											 $newShopCartPartNumber, $newShopCartCustomerReference){
       	try {
       		$this->setShopCartProfileID($newShopCartProfileID);
				$this->setShopCartProductMrfNumID($newShopCartProductMrfNumID);
				$this->setShopCartQuantity($newShopCartQuantity);
				$this->setShopCartPartNumber($newShopCartPartNumber);
				$this->setShopCartCustomerReference($newShopCartCustomerReference);
			}
			    //determine what exception type was thrown
			 catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError
			 $exception) {
       		$exceptionType = get_class($exception);
       		throw(new $exceptionType($exception->getMessage(), 0, $exception));
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
		  * @param Uuid | string $newShopCartProfileID new value of shopCartProfile ID
		  * @throws \ RangeException if $newShopCartProfileID is not positive
		  * @throws \ TypeError if $newshopCartProfileID is not a uuid or string
		  **/
	    public function setShopCartProfileID($newShopCartProfileID) : void {
			 try {
				 $uuid = self::validateUuid($newShopCartProfileID);
			 } catch(\InvalidArgumentException | \RangeException | \Exception  | \TypeError
			 $exception) {
			 	$exceptionType = get_class($exception);
			 	throw(new $exceptionType($exception->getMessage(), 0, $exception));
			 }
			 // convert and store for shopCartProfile ID
			 $this->shopCartProfileID = $uuid;

		 }

	/**
	 * accessor method for shopCartProductMrfNum ID
	 * @return string value of shopCartProductMrfNum ID
	 */
	public function getShopCartProductMrfNumID(): string{
		return ($this->shopCartProductMrfNumID);
	}

	/** mutator method for shopCartProductMrfNumID
	 * @param string $newShopCartProductMrfNumID new value of Product part Number
	 * @throws \InvalidArgumentException if $newShopCartProductMrfNumID is not a string or insecure
	 * @throws \RangeException if $newShopCartProductMrfNumID is >64 characters
	 */
	public function setShopCartProductMrfNumID(string $newShopCartProductMrfNumID): void {
		// verify the setShopCartProductMrfNumID content is secure
		$newShopCartProductMrfNumID = trim($newShopCartProductMrfNumID);
		$newShopCartProductMrfNumID = filter_var($newShopCartProductMrfNumID, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newShopCartProductMrfNumID) === true) {
			throw(new \InvalidArgumentException ("Part number content is empty or insecure"));
		}
		//verify the mrf number will fit in the datebase
		if(strlen($newShopCartProductMrfNumID)>= 64){
			throw(new \RangeException("Mrf part number is to long"));
		}

		//* store the Mrf part number
		$this->shopCartProductMrfNumID = $newShopCartProductMrfNumID;

	}

	/**
	 * accessor method for shop Cart Quantity
	 * @return string value of shopCartQuantity
	 */
	public function getShopCartQuantity(): string {
		return ($this->shopCartQuantity);
	}

	/** mutator method for shopCartProductMrfNumID
	 * @param string $newShopCartQuantity new value of Product Mrf part Number
	 * @throws \InvalidArgumentException if $newShopCartQuantity is not a string or insecure
	 * @throws \RangeException if $newShopCartQuantity is >16 characters
	 */
	public function setShopCartQuantity(string $newShopCartQuantity): void {
		// verify the quantity is secure
		$newShopCartQuantity = trim($newShopCartQuantity);
		$newShopCartQuantity = filter_var($newShopCartQuantity, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
      if(empty($newShopCartQuantity) === true) {
      	throw (new \InvalidArgumentException(" Specify quantity need"));
		}

		// verify the quantity content will fit in the database
		if(strlen($newShopCartQuantity) >= 16) {
			throw(new \RangeException("quantity is to large contact digikey"));
		}
		//store shopCartQuantity content
		$this->shopCartQuantity = $newShopCartQuantity;
	}

	/**
	 * accessor method for shop Cart part number
	 * @return string value of shopCartPartNumber
	 */
	public function getShopCartPartNumber(): string {
		return($this->shopCartPartNumber);
	}

	/** mutator method for shopCartPartNumber
	 * @param string $newShopCartPartNumber new value of shop Cart digkey Part Number
	 * @throws \InvalidArgumentException if $newShopCartQuantity is not a string or insecure
	 * @throws \RangeException if $newShopCartPartNumber is >16 characters
	 */
	public function setShopCartPartNumber(string $newShopCartPartNumber) : void {
		//verify the shop cart part number
		$newShopCartPartNumber = trim($newShopCartPartNumber);
		$newShopCartPartNumber = filter_var($newShopCartPartNumber, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newShopCartPartNumber) ===true){
			throw(new \InvalidArgumentException("Enter part number"));
		}

		//verify the shop cart part number will fit in the date base
		if(strlen($newShopCartPartNumber) >= 16){
			throw(new \RangeException("part number is too long"));
		}
		//store the part number
		$this->shopCartPartNumber = $newShopCartPartNumber;
	}


	/**
	 * accessor method for shop Cart Customer Ref number
	 * @return string value of  shopCartCustomerReferenc
	 */
	public function getShopCartCustomerReference(): string {
		return($this->shopCartCustomerReference);
	}

	/** mutator method for  shopCartCustomerReference
	 * @param string $newShopCartCustomerReference new value of customer Ref number
	 * @throws \InvalidArgumentException if $newShopCartCustomerReference is not a string or insecure
	 * @throws \RangeException if $newShopCartCustomerReference is >64 characters
	 */
	public function setShopCartCustomerReference(string $newShopCartCustomerReference) : void {
		//verify the customer reference number
		$newShopCartCustomerReference = trim($newShopCartCustomerReference);
		$newShopCartCustomerReference = filter_var($newShopCartCustomerReference, FILTER_SANITIZE_STRING,
			FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newShopCartCustomerReference) ===true){
			throw(new \InvalidArgumentException("Need Reference number"));
		}

		//verify the shop cart part number will fit in the date base
		if(strlen($newShopCartCustomerReference) >= 64){
			throw(new \RangeException("part number is too long"));
		}
		//store the part number
		$this->shopCartCustomerReference = $newShopCartCustomerReference;
	}



//******************************************************************************************************

/**
 * inserts this MFR part number into mySQL
 * @param \PDO $PDO PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function insert(\PDO $pdo) : void {

	//create query template
	$query = "INSERT INTO ShoppingCart(shopCartProfileID, shopCartProductMrfNumID, shopCartQuantity, shopCartPartNumber, shopCartCustomerReference)
VALUES(:shopCartProfileID, :shopCartProductMrfNumID, :shopCartQuantity, :shopCartPartNumber, :shopCartCustomerReference)";
	$statemate = $pdo->prepare($query);

	// bind the member variables to the place holders in the template
	$parameters = ["shopCartProfileID" => $this->shopCartProfileID->getBytes(),
	"shopCartProductMrfNumID"=>$this->shopCartProductMrfNumID,
	"shopCartQuantity"=>$this->shopCartQuantity,
	"shopCartPartNumber"=>$this->shopCartPartNumber,
	"shopCartCustomerReference"=>$this->shopCartCustomerReference];
	     $statemate->execute($parameters);
}

/**
 *deletes this shopping cart from mySQL
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 */
public function delete(\PDO $pdo) : void {

	//create query template
	$query = "DELETE FROM ShoppingCart WHERE shopCartProfileID = : shopCartProfileID";
	$statement = $pdo->prepare($query);

	//bind the member variables to the place holder in the template
	$parameters = ["shopCartProfileID" => $this->shopCartProfileID->getBytes()];
		$statement->execute($parameters);
}

	/**
	 * updates this shopping cart in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/

	public function update(\PDO $pdo) : void {

		//create query template
		 $query = "UPDATE ShoppingCart SET shopCartProductMrfNumID = :shopCartProductMrfNumID, shopCartQuantity = :shopCartQuantity,
shopCartPartNumber = :shopCartPartNumber, shopCartPartNumber = :shopCartPartNumber WHERE shopCartProfileID = :shopCartProfileID ";
		 $statment = $pdo->prepare($query);


	}




}







shopCartProductMrfNumID VARCHAR(64),
      shopCartQuantity VARCHAR(16),
      shopCartPartNumber VARCHAR(16),
      shopCartPartNumber VARCHAR(64),


?>






