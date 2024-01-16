let myList = ["Senf", "Brot", "Butter"];

/*Checkbox Vorlage Listenelement

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Default checkbox
  </label>
</div>*/

//FOR SCHLEIFE - Ausgabe der Einträge, der Produkte die bereits in die Liste hinzugefügt wurden
// $(myList).each(function (i, product) {
//     console.log(product);
// });

const addNewProduct = function () {
    myList.push($("#new-product").val());
    prependNewProduct(myList.lenght - 1, myList[myList.length - 1]);
    $("#new-product").val("").focus();
};

// onclick (event) was wird gemacht , was wird ausgeführt ()
$("#add-product").on("click", addNewProduct);

$("#new-product").on("keyup", function (e) {
    console.log(e.keyCode);

    if (e.keyCode == 13) {
        addNewProduct();
    }
});

const prependNewProduct = function (index, product) {
    $("#product-list").prepend(
        `
        <div class="form-check" data-product-id="${index}">
    <input
        class="form-check-input"
        type="checkbox"
        value="${product}"
        id="product-${index}"
    />
    <label 
        class="form-check-label" for=${index}>
        ${product}    
    </label>
</div>
`
    );
};

const createProductList = function () {
    $(myList).each(prependNewProduct);
};

createProductList();

// Plain Javascript
// myList.forEach(function(product){
//     console.log(product);
// });
