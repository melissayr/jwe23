let myNumber = 123;
let myString = "23-05-2025";
let myArray = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

let myObject ={
    type: 'car',
    brand: 'audi',
    kw: '334',
    color: 'red',
    price: "120.000,50"
};

let myObject2 ={
    type: 'car',
    brand: 'opel',
    kw: '90',
    color: 'braun',
    price: "20.000,50" // 20000.50
};

// convertieren, herausfiltern von zahlen int oder Float mit komma stellen in[] mit parseInt("") oder parseFloat()

console.log("Die Abbuchung erfolgt von dem Konto mit der Nummer: " + myNumber);

console.log("the bill has been paid on " + myArray[3]);

console.log("My car has"+ myObject.kw +"and this is from the brand"+myObject.brand);

console.log (myObject.kw - myObject2.kw); // - ist vergleichen

myObject.price = Number (myObject.price.replace('.','').replace(",","."));
myObject.price = Number (myObject2.price.replace('.','').replace(",","."));//replace geht nur bei strings - der Punkt im 10k bereich wird durch 'Nichts' ersetzt 

console.log(Number(myObject.price)); // Number ist eine function und wandelt von string in integer um

console.log(myObject.price - myObject2.price);

console.log(new Date (myString));

let price = "€ 1.433,08"; 

console.log(price.substring(2,10)); // substring -> string zerlegen (bei 2 beginnen wir zu lesen bis 10 stelle) 

let price2 = "7.247,00 Euro";

console.log(price2.search("Euro")); //search - position/stelle wo 'Euro losgeht - in diesem Fall 10

let price3 = "7.247,00 Euro";

console.log(price2.replace("Euro", ""));

//convert/parse csv-structured string into array
let stringOfInfo = ("Max;Mustermann;Salzburgerstrasse56;5620;+46354564485153");
console.log(stringOfInfo.split(";"));


//convert/parse string into array
let serverResponse = '["Monday","Tuesday"]';
console.log(JSON.parse(serverResponse));
//convert/parse string into object
let serverResponse2 = '{"test":1, "email":"Mo@obinet.at"}';
console.log(JSON.parse(serverResponse2));

//Regular expression - (regex) zb. IBAN Muster mit Buchstaben/Zahlen
//regex101 (regex Tester) prüft ob email gültig ist zb ob ein @vorkommt, ob das passwort sicher genug ist, usw
//Chatgbt(chat.openia) regex erstellen für ein Datumsformat, für kreditkarten nr , iban usw




