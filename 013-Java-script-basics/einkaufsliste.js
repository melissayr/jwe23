let myList = []; // Leere Eimkaufsliste, wird später befüllt

// let myTopItems = ['Bier', 'Chips', 'Limewodka', 'Tschick'];

// myList.push('Banane');

let newElement = document.querySelector("#newElement");

let addNewElement = function () {
    let newElementVelue = newElement.value;
    console.log(newElementVelue);
    myList.push(newElementVelue);
    getAllElementsFromList();
};

let getAllElementsFromList = function () {
    let htmlOutPut = "";
    //myList Elemente alle durchgehen Zeile für Zeile in htmlOutPut verketten

    myList.forEach((element) => {
        htmlOutPut += element + "<br>";
    });

    document.querySelector("#myListOutPut").innerHTML = htmlOutPut;
};


