let person = {
    myAge: 28,
    myName: "Melissa",
    color: ["blue", "yellow", "pink", "orange", "green", "red"],
};

// console.log(person.color[2]);

// $("#p1").text(person.myName);

$("#button").on("click", formvalues);

function formvalues(e) {
    let Name = $("#name").val(); //auslesen und speichern in der variable(in let Name wird es gespeichert)
    let Vorname = $("#prename").val();
    let Email = $("#mail").val();
    let Alter = $("#age").val();

    $("#name").val(""); //formularfeld wird geleert nach de speichern und button click
    $("#prename").val("");
    $("#mail").val("");
    $("#age").val("");

    $("#ausgabe").text(`
Hallo mein Name ist ${Name},
und ich bin ${Alter} Jahre alt
`);
}

$("p").each(function () {
    console.log(":" + $(this).text());
});


