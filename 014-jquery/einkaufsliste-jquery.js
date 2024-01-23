let myList = ["Senf", "Brot", "Butter"];

//Wenn das Cookie für die "product-list" existiert, dann befülle das Array mit den Produkten aus dem Cookie
if (typeof Cookies.get("product_list") !== "undefined") {
    myList = Cookies.get("product_list").split(",");
}

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
    let value = $("#new-product").val();

    if (!filteredList.length) {
        myList.push(value);
        Cookies.set("product_list", myList, {
            expires: 365,
        }); /*einkaufsliste gespeichert in Cookies für 365 T*/
        prependNewProduct(myList.lenght - 1, myList[myList.length - 1]);
    } else {
        $("#new-product").val("").focus();
    }

    $("#new-product").val("").focus();
};

// onclick (event) was wird gemacht , was wird ausgeführt ()
$("#add-product").on("click", addNewProduct);

$("#new-product").on("keyup", function (e) {
    console.log(e.keyCode);
    //enter wurde gedrückt
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

const setCheckedListItems = function () {
    const cookie = Cookies.get('checked_items');
    if(typeof cookie !="undefined" && cookie != ''){
        let checkedItems = cookie.split(',');
        $(checkedItems).each(function(index, value)
        { $('#product-' +value).prop('checked', true);

        });

    }
};

setCheckedListItems();

const showFilteredList = function (list) {
    $("#product-list").empty();

    $(list).each(prependNewProduct);
};

const filterList = function () {
    let value = $(this).val().toLowerCase(); //documentQueryselector. # new-product = this
    let filteredList = myList.filter(function (article) {
        return article.toLowerCase().includes(value);
    });

    showFilteredList(filteredList);
};

$("#new-product").on("click", filterList);
$("#new-product").on("keyup", filterList);

$("input.form-check-input").on("click", function () {
    let checkbox = $(this);
    console.log(checkbox.prop("checked"));

    if (checkbox.prop("checked") == true) {
        // speichere in array
    }
});

//lesen der aktuellen gechecked inputs
//bauen des Arrays mit der Liste aller product-ids der Elemente die gecheckt sind
//Speichern Cookie

//let checkedInputs; // Global

$("#product-list input").change(function () {
    let listOfCheckedInputs = [];

    let checkedInputs = $("input:checked"); // innerhalb { nur für die function}
    checkedInputs.each(function () {
        let productId = $(this).closest("[data-product-id]").data("product-id");
        console.log(productId);

        listOfCheckedInputs.push(productId);
        console.log(listOfCheckedInputs);
    });

    Cookies.set("checked_items", listOfCheckedInputs.join(","), {expires: 365}); //Join zerlegt das array
});

//Cookie auslesen
//Array mit Schleife durchgehen
//Listenelemente .prop()aktualisieren
