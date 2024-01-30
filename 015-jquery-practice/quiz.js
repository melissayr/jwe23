const quiz = [
    {
        question: "Welche Farbe hat eine Zitrone?",
        answer: ["Blau", "Gelb", "Rot", "Grün"],
        rightAnswerOne: 1,
    },

    {
        question: "Was ist die Hauptstadt von Deutschland?",
        answer: ["Berlin", "Köln", "München", "Hamburg"],
        rightAnswer: 0,
    },

    {
        question: "Wie wird die Erde noch genannt?",
        answer: ["Kugel", "Grosser Planet", "Blauer Planet", "Pluto"],
        rightAnswer: 2,
    },

    {
        question: "Welche Programmier Scriptsprache lernen wir?",
        answer: ["Python", "Typescript", "Ruby", "Javascript"],
        rightAnswer: 3,
    },
];

let correcrAnswers = 0;
let currentQuestion = 0;

let showQuestion = function (index) {
    let question = quiz[index].question;
    $("#questions").text(question);
};

let showAnswers = function (index) {
    let answers = quiz[index].answer;
    //Vor dem befüllen leeren
    $("#answers").html("");
    //Jede frage einzel in das div'answers einfügen
    $(answers).each(function (index, answer) {
        $("#answers").append(`
       <button data-index=${index} class="answer-button"> [${index}] ${answer}</button> <br>`);
    });
};

// let clickAnswer = function(index) {
//     $("#button").on("click", function() {

//     } )
// }

const checkAnswer = function (questionIndex, answerIndex) {
    //prüfen ob eine frage richtig beantwortet wurde

    let correctAnswer = quiz[questionIndex].rightAnswer;
    let givenAnswer = answerIndex;

    if (givenAnswer == correctAnswer) {
        console.log("Richtig!");
        correctAnswers++;
    } else {
        console.log("Falsch");
    }

    if (currentQuestion < quiz.length) {
        currentQuestion++;
        showQuestion(currentQuestion);
    } else showResult();
};

const showResult = function () {
    $("#questions").empty();
    $("#answers").empty();
    $(".result").text();
};
