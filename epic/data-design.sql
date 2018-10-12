ALTER DATABASE daugustson CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS shopping_cart;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile (
      profileID BINARY(16) NOT NULL,
      profileHash CHAR(97) NOT NULL,
      profileAddress VARCHAR(128) NOT NULL,
      profilePhone VARCHAR(32) NOT NULL,
      profileJobTitle TEXT(128) NOT NULL,
      porfileEmail VARCHAR(128) NOT NULL,

      UNIQUE(porfileEmail),

      PRIMARY KEY (profileID)
);

CREATE TABLE product (
      productMrfNumID BINARY(128) NOT NULL,
      productDigikeyPartNumber VARCHAR(128),
      productQuantityAvailable VARCHAR(128),
      productManufacturerName TEXT(128),
      productDescription TEXT(128),
      productManufacturerLeadTime VARCHAR(64),
      productDetailedDescription TEXT(128),

      PRIMARY KEY (productMrfNumID)
);

CREATE TABLE shopping_cart (
      shopCartProfileID BINARY(16),
      shopCartProductMrfNumID BINARY(16),
      shopCartQuantity VARCHAR(64),
      shopCartPartNumber VARCHAR(128),
      shopCartCustomerReference VARCHAR(64),

      INDEX(shopCartProfileID),
      INDEX(shopCartProductMrfNumID),

   FOREIGN KEY(shopCartProfileID) REFERENCES profile(profileID),
   FOREIGN KEY(shopCartProductMrfNumID) REFERENCES product(productMrfNumID),

   PRIMARY KEY(shopCartProfileID, shopCartProductMrfNumID)
);
