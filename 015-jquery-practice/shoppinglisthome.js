let myList = ["Senf", "Brot", "Butter"];

if (typeof Cookies.get("productlist") !== "undefined") {
    myList = Cookies.get("productlist").split(",");
}

const addNewProduct = function () {
    let value = $("#newProduct").val();

    if (!filteredList.length) {
        myList.push(value);
        Cookies.set("productlist", myList, {
            expires: 365,
        });
        prependNewProduct(myList.lenght - 1, myList[myList.length - 1]);
    } else {
        $("#newProduct").val("").focus();
    }

    $("#newProduct").val("").focus();
};

$("#button").on("click", addNewProduct);
