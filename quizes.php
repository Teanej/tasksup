<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TasksUp</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
    rel="stylesheet"
  />
  <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
</head>
<body>
<style>
 * {
   font-family: "Raleway";
 } 
  html, body{
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  font-family:"Raleway";
  background-color: black;
}

h1, h2, h3, h4, h5, h6{
  font-weight: 200;
}

input{
  margin: 20px auto;
  padding: 8px 10px;
  border: none;
  outline: none;
}

button{
  padding: 8px 20px;
  background-color: royalblue;
  color: #fff;
  border: none;
  cursor: pointer;
}

.addQuestions, h2{
  margin: 40px auto;
  text-align: center;
  color: #fff;
}

.info{
  text-align: center;
}

.info li{
  list-style-type: none;
  color: #fff;
}

.info button{
  margin: 30px 0;
  -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
}

.questionsWrapper div{
  display: none;
  position: absolute;
}

.questionsWrapper div.is-active{
  display: block;
}

.questionDiv{
  margin: 20px auto;
  text-align: center;
  width: 100%;
}

.questionDiv li{
  list-style-type: none;
  color: #fff;
  padding: 12px 0;
}

.questionDiv li.correct, .questionDiv li.wrong{
  cursor: pointer;
}

.answersCorrect{
  color: #fff;
  text-align: center;
}

.nextButton{
  margin: 20px auto;
}
</style>
<h2>TasksUp Quizes</h2>
  <div class="addQuestions">
    <input id="questionInput" type="text" placeholder="Question">
    
    <br>
    <input id="correctInput" type="text" placeholder="Correct Answer">
    
    <br>
    <input id="wrongOneInput" type="text" placeholder="Wrong Answer 1">
    
    <br>
    <input id="wrongTwoInput" type="text" placeholder="Wrong Answer 2">
    
    <br>
    <button onclick="handlers.addQuestion()">Add Question to your Quiz</button>
  </div>
  <div class="info">
    <li id="NumberQuestionsInQuiz">You currently have 0 questions added to your quiz</li>
    
    <br>
    <button onclick="view.displayQuestions()" id="startQuiz">Enter the quiz</button>
  </div>
  <p class="answersCorrect"></p>
  <div class="questionsWrapper"></div>
<script>
  let quiz = {
  //Array for questions
  questions: [],

  //Add questions as objects to array
  addQuestion: function(question, correct, wrongOne, wrongTwo){
    this.questions.push({
      question: question,
      correct: correct,
      wrongOne: wrongOne,
      wrongTwo: wrongTwo
    });
    //upadate number of questions each time you add one
    view.displayNumberOfQuestions();
  },

  movingToNextQuestion: function(){
    //find all next buttons and add event lisener to them
    let nextButton = document.querySelectorAll(".nextButton");
    for(i = 0; i < nextButton.length; i++){
      nextButton[i].addEventListener("click", function(event){
        //Find the element that was clicked
        let elementClicked = event.target;
        //If it was a next button then remove the is-active class from it parent
        if(elementClicked.className === "nextButton"){
          elementClicked.parentNode.classList.remove("is-active");
          //If there isnt a next sibling then reshow the options to add questions and the info div
          if(elementClicked.parentNode.nextElementSibling === null) {
            let showAdd = document.querySelector(".addQuestions");
            let showInfo = document.querySelector(".info");
            showAdd.style.display = "block";
            showInfo.style.display = "block";
          } else {
            //If there is a next siblng then add the is-active class to it
            elementClicked.parentNode.nextElementSibling.classList.add("is-active");
          }
        }
      });
    };
  }
};

let handlers = {
  //This runs when you click add question button
  addQuestion: function(){
    //Get each of the inputs by id
    let questionInput = document.getElementById("questionInput");
    let correctInput = document.getElementById("correctInput");
    let wrongOneInput = document.getElementById("wrongOneInput");
    let wrongTwoInput = document.getElementById("wrongTwoInput");
    //pass the values of the inputs into the addQuestion method in the quiz object which will add them to question array
    quiz.addQuestion(questionInput.value, correctInput.value, wrongOneInput.value, wrongTwoInput.value);
    //clear the inputs
    questionInput.value = "";
    correctInput.value = "";
    wrongOneInput.value = "";
    wrongTwoInput.value = "";
  }
}

let view = {
  //This runs when you click start quiz
  displayQuestions: function(){
    //Hide the options to add questions and the info
    let hideAdd = document.querySelector(".addQuestions");
    let hideInfo = document.querySelector(".info");
    hideAdd.style.display = "none";
    hideInfo.style.display = "none";
    //Clear the quesitons wrapper
    let questionsWrapper = document.querySelector(".questionsWrapper");
    questionsWrapper.innerHTML = "";

    //for each quesiton in array create elements neede and give classes
    quiz.questions.forEach(function(question, index){
      let questionDiv = document.createElement("div");
      questionDiv.setAttribute("class", "questionDiv");
      let nextButton = document.createElement("button");
      nextButton.setAttribute("class", "nextButton");
      let questionLi = document.createElement("li");
      let correctLi = document.createElement("li");
      correctLi.setAttribute("class", "correct");
      let wrongOneLi = document.createElement("li");
      wrongOneLi.setAttribute("class", "wrong");
      let wrongTwoLi = document.createElement("li");
      wrongTwoLi.setAttribute("class", "wrong");

      //add each question div to the question wrapper
      questionsWrapper.appendChild(questionDiv);

      questionsWrapper.firstChild.classList.add("is-active");

      //add the text to the inputs the values in the questions array
      questionLi.textContent = question.question;
      correctLi.textContent = question.correct;
      wrongOneLi.textContent = question.wrongOne;
      wrongTwoLi.textContent = question.wrongTwo;

      //If its the last question the button should say finish if not it should say next
      if (index === quiz.questions.length - 1){
        nextButton.textContent = "Finish";
      } else{
        nextButton.textContent = "Next";
      }

      //Append elements to div
      questionDiv.appendChild(questionLi);

      //put the answers in a random order before apprending them so correct isnt always 1st
      let array = [correctLi, wrongOneLi, wrongTwoLi];
      array.sort(function(a, b){return 0.5 - Math.random()});
      array.forEach(function(item){
        questionDiv.appendChild(item);
      });

      questionDiv.appendChild(nextButton);

      this.displayAnswersCorrect();
      quiz.movingToNextQuestion();


    }, this);
  },

  displayAnswersCorrect: function(){
    let questionDiv = document.querySelectorAll(".questionDiv");
    let correctAnswers = 0;
    let answersCorrect = document.querySelector(".answersCorrect");
    answersCorrect.textContent = "Correct answers: " + correctAnswers;

    //add click event to each question div if the element clicked has class correct then add 1 to correctAnswers and change the color of element to green.
    //Else change the color of element to red and find the elemtn with correct class and make it green
    for (let i = 0; i < questionDiv.length; i++) {
      questionDiv[i].onclick = function(event) {
        event = event || window.event;
        if(event.target.className === "correct"){
          correctAnswers++;
          answersCorrect.textContent = "Correct answers: " + correctAnswers;
          event.target.style.color = "#2ecc71";
        } else if(event.target.className === "wrong"){
          event.target.style.color = "#e74c3c";
          let itemChildren = event.target.parentNode.children;
          for(i = 0; i < itemChildren.length; i++){
            if(itemChildren[i].classList.contains("correct")){
              itemChildren[i].style.color = "#2ecc71";
            }
          }
        }
        //Remove correct and wrong classes so the same question the score cant go up and colors cant chaneg
        let itemChildren = event.target.parentNode.children;
        for(i = 0; i < itemChildren.length; i++){
          itemChildren[i].classList.remove("correct");
          itemChildren[i].classList.remove("wrong");
        }
      }
    }

  },

  //count objects in array to show how many questions added to screen
  displayNumberOfQuestions: function(){
    let numberLi = document.getElementById("NumberQuestionsInQuiz");
    if(quiz.questions.length === 1) {
      numberLi.textContent = "You currently have " + quiz.questions.length + " question added to your quiz";
    } else {
      numberLi.textContent = "You currently have " + quiz.questions.length + " questions added to your quiz";
    }
  }
}

</script>  
</body>
</html>