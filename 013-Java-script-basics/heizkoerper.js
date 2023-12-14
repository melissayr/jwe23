let temperature = 24; //integer

let display = document.querySelector("#display");

console.log(temperature);
//Temperatur gleich ausgeben (beim Laden)
document.querySelector("#display").innerHTML = temperature;

let changeTemperature = function (direction) {
    if (direction == "up") {
        temperature++;
    }
    if (direction == "down") {
        temperature--;
    }

    console.log(temperature);
    // aktuelle Temperatur
    display.innerHTML = temperature;
};
