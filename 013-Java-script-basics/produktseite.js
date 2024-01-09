const PRODUCT_DATA = {
    id: 234,
    artNo: 684789,
    productTitle: "Ed Hardy Mustang Feaver Nature",
    variants: {
        sizes: ["XS", "S", "M", "L", "XL"],
        colors: ["black", "navy", "olive", "brown"],
    },

    price: 79.9,
    productImage: "pexels-hallux-makenzo-743715.jpg",
    description: "Hier wird der Artikel beschrieben",
};

document.querySelector("#art-no").innerHTML = PRODUCT_DATA.artNo;

document.querySelector("#product-title").innerHTML = PRODUCT_DATA.productTitle;

document.querySelector("#price").innerHTML = PRODUCT_DATA.price;

document.querySelector("#product-description").innerHTML = PRODUCT_DATA.description;
