<?php
namespace daugustson\DataDesign;



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





}

