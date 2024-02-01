let degree = 22;

let display = $("#display");

console.log(degree);

$("#display").text(degree);

let upAndDown = function (direction) {
    if (direction == "up") {
        degree++;
    }
    if (direction == "down") {
        degree--;
    }

    $("#display").text(degree);

    console.log(degree);
    // aktuelle Temperatur
    $("display").innerHTML = degree;
};


