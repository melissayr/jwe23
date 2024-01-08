let score = 0; // Integer
let currentQuestionIndex = 0;

//gesamtes Paket wird bei 3 Fragen 3x gebraucht -  object:
//Frage
//Mögliche Antworten
//Richtige Antwort

let questions = [
    {
        question: "Was ist die Hauptstadt von Deutschland?",
        //           0         1        2          3
        answers: ["Paris", "London", "Berlin", "Madrid"],
        correctAnswer: 2,
    },
    {
        question: "Welche Farbe hat eine Zitrone?",
        //           0         1        2          3
        answers: ["Gelb", "Blau", "Grün", "Rot"],
        correctAnswer: 0,
    },
    {
        question: "Was ist das größte Land der Welt?",
        //           0         1        2          3
        answers: ["Kanada", "Russland", "USA", "China"],
        correctAnswer: 1,
    },
];

function displayQuestion() {
    if (currentQuestionIndex >= questions.length) {
        document.getElementById("quiz-container").hidden = true;
        document.getElementById("result").hidden = false;
        document.getElementById("score").textContent = score;

        return;
    }

    let question = questions[currentQuestionIndex];

    document.getElementById("question").textContent = question.question;

    let answersDiv = document.getElementById("answers");
    answersDiv.innerHTML = "";

    question.answers.forEach((answer, index) => {
        let answerButton = document.createElement("button");
        answerButton.textContent = answer;
        answerButton.onclick = () => checkAnswer(index);
        answersDiv.appendChild(answerButton);
    });
}

displayQuestion();

function checkAnswer(userAnswer) {
    let correctAnswer = questions[currentQuestionIndex].correctAnswer;

    if (userAnswer == correctAnswer) {
        score += 1;
    }

    currentQuestionIndex += 1;

    displayQuestion();
}

function nextQuestion() {
    currentQuestionIndex += 1;
    displayQuestion();
}
