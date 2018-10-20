insert into profile(profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail)
values (unhex("9e6c1cf56bf84fca966d24d625a66d6a"), "ac4fbfae4f3fedc2f08eef15c335e1d3a6e09dad7eafc614701fa73247801b816ef197477c0619dcb098ce29a06753d0",
		  "7623 pioneer trail", 5053794747, "eng tech", "day.m.augustson@gmail.com" );

insert into profile(profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail)
values (unhex("c84df3527c89449dafc4c751f0e885e4"), "7e28b511b7d33971ef56a8f7cbeb0c8bee9e91fd23689e68147f160ab7933b7f0e30322015653d8e1af04aec58a2137c",
		  "23 dead woood", 5053795858, "eng tech", "dsdfsdd@gmail.com" );


insert into profile(profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail)
values (unhex("db3f308785cd415d91ef72c64a44af11"), "f5b64c2bfe902de4babd6bb1830a774d384b093ca8c6840f6d81e4ffbd0f314b2fdcc2fbd4e53fd7a02310e9b58ef9eb",
		  "2333 bark", 5053797654, "baker", "d333333r@gmail.com" );

insert into profile(profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail)
values (unhex("4a0e94796cba4395a384b83d23804ef6"), "e6827e9c1b53e7832ea2a7f4dea7d81cde1aa3818ea2d20af0ec5f376e6cc949e55a65cdfac2e0ecdcf34503f125e62e",
		  "745 quial loop", 505374532, "maid", "fsadf435@gmail.com" );

update profile set profileAddress= "23Pebo", profilePhone= 505899999, profileJobTitle = "docotr", porfileEmail="454545gmail.com"
where profileID=unhex("c84df3527c89449dafc4c751f0e885e4");

delete from profile where profileID = unhex("4a0e94796cba4395a384b83d23804ef6");

insert into profile(profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail)
VALUE ((unhex("a8e6e535d22e4a76a647a0dd7db6c1e9")),
		 "787e6d3d6b6bf3df4afa63e8d422d844653506ce8fc27d3baa28c2595b3f4c298ad032473f40b95bf0fe291c17a58561",
		 "04040work", 5559999, "lazy man", "whatismyemail@aol.com");


select profileID, profileHash, profileAddress, profilePhone, profileJobTitle, porfileEmail
from profile
where profileID = (unhex("a8e6e535d22e4a76a647a0dd7db6c1e9"));

select shopping_cart.shopCartProfileID, shopping_cart.shopCartProductMrfNumID, shopping_cart.shopCartQuantity, shopping_cart.shopCartPartNumber,
		 shopping_cart.shopCartCustomerReference, product.productDescription
from shopping_cart inner join product on shopping_cart.shopCartProductMrfNumID = product.productMrfNumID
where shopCartProfileID = (unhex("3ba1986d841749b5955e3115a5d44a83"));



