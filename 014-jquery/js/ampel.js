// const settings = {
//     states: [
//         "0", //rot
//         "01", // rot+gelb
//         "2", //grün
//         "1", //gelb
//     ],
//     state: "2", //starten mit grün
//     duration: {
//         red: 5, // sek Zeit die die ampel rot ist
//         green: 5, // sek Zeit die die ampel grün ist
//     },
// };

// $("#ampel").text(settings.state);
// const fromGreentoRed = function () {
//     //von grün auf rot
//     window.setTimeout(function () {
//         settings.state = settings.states[3]; // setzen auf gelb
//         window.setTimeout(function () {
//             settings.state = settings.states[0];
//             //warten bis die andere Funktion aufgerufen wird
//             window.setTimeout(fromRedtoGreen, settings.duration.red * 1000); // setzen auf rot
//         }, 1000);
//     }, 1000);
// };

// const fromRedtoGreen = function () {
//     window.setTimeout(function () {
//         settings.state = settings.state[1];
//         window.setTimeout(function () {
//             settings.state = settings.states[2];
//         }, 1000);
//     }, 1000);
// };

// window.setInterval(function () {
//     $("ampel").text(settings.state);
// }, 1000);

//Settings SELBSTVERSUCH

const settings = {
    stages: ["redlight", "orangelight", "redorangelight", "greenlight"],

    stage: "greenlight", // starten mit grün

    duration: {
        redlight: 5,
        greenlight: 5,
    },

    switchpase: { phase: 1 },
};

//JS

$("#ampel").attr("class", "stage-" + settings.stage);

const fromGreentoRed = function () {
    // von grün auf rot
    window.setTimeout(function () {
        settings.stage = settings.stages[1]; // setzen auf gelb
        window.setTimeout(function () {
            settings.stage = settings.stages[0];
            //warten bis die andere Funktion aufgerufen wird
            window.setTimeout(
                fromGreentoRed,
                settings.duration.redlight * 1000
            ); // setzen auf rot
        }, 1000);
    }, 1000);
};

const fromRedtoGreen = function () {
    //von rot auf rotOrange auf grün
    window.setTimeout(function () {
        settings.stage = settings.stages[2]; //redorange
        window.setTimeout(function () {
            settings.stage = settings.stages[3];
            window.setTimeout(
                fromRedtoGreen,
                settings.duration.greenlight * 1000
            ); // setzen auf grün
        }, 1000);
    }, 1000);
};

window.setInterval(function () {
    //document.querySelector (#ampel).setAttribute ..... 
    $("#ampel").attr("class", "stage-" + settings.stage);
}, 1000);

fromGreentoRed();
