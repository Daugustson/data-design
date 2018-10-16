select shopping_cart.shopCartProfileID, shopping_cart.shopCartProductMrfNumID, shopping_cart.shopCartQuantity, shopping_cart.shopCartPartNumber,
		 shopping_cart.shopCartCustomerReference, product.productDescription
from shopping_cart inner join product on shopping_cart.shopCartProductMrfNumID = product.productMrfNumID
where shopCartProfileID = (unhex("3ba1986d841749b5955e3115a5d44a83"));





