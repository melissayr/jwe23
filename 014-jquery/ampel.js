const settings = {
    states: [
        "0", //rot
        "01", // rot+gelb
        "2", //grün
        "1", //gelb
    ],
    state: "2", //starten mit grün
    duration: {
        red: 5, // sek Zeit die die ampel rot ist
        green: 5, // sek Zeit die die ampel grün ist
    },
};

$("#ampel").text(settings.state);
const fromGreentoRed = function () {
    //von grün auf rot
    window.setTimeout(function () {
        settings.state = settings.states[3]; // setzen auf gelb
        window.setTimeout(function () {
            settings.state = settings.states[0];
            //warten bis die andere Funktion aufgerufen wird
            window.setTimeout(fromRedtoGreen, settings.duration.red * 1000); // setzen auf rot
        }, 1000);
    }, 1000);
};

const fromRedtoGreen = function () {
    window.setTimeout(function () {
        settings.state = settings.state[1];
        window.setTimeout(function () {
            settings.state = settings.states[2];
        }, 1000);
    }, 1000);
};

window.setInterval(function () {
    $("ampel").text(settings.state);
}, 1000);
