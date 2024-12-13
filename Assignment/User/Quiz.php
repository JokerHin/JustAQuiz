<?php
include('../../main.php');
include('../session.php');

if (isset($_GET['id']) && isset($_GET['q'])) {
    $quizid = intval($_GET['id']);
    $qnum = intval($_GET['q']);
    $amount=total_question($quizid, $conn);
    $quiz = mysqli_query($conn, "SELECT * FROM quiz WHERE quiz_id=$quizid");
    $row = mysqli_fetch_array($quiz);
    $time_remain = $row['time_limit'];
    $status=start_quiz_attempt($quizid,$conn); //create attempt

    //fetch question
    $questions = mysqli_query($conn, "SELECT * FROM question WHERE quiz_id=$quizid");
    $allRows = $questions->fetch_all(MYSQLI_ASSOC);
    for ($i = 0; $i < $qnum; $i++) {
        $row = $allRows[$i];
        $qid = $row['question_id'];
        $question_text = $row['question_text'];
    }

    //fetch choices
    $choices = mysqli_query($conn, "SELECT * FROM choices WHERE question_id=$qid");
    $choiceArray = array();
    $choiceidArray = array();
    while ($row = mysqli_fetch_array($choices)) {
        $cid = $row['choice_id'];
        $text = $row['text'];
        array_push($choiceidArray, $cid);
        array_push($choiceArray, $text);
    }
    $answers=array();
} else {
    echo "<script>alert('Please choose quiz to start.');window.location.href='HTML.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="Quiz.css">
    <style>
        #rocket {
            position: absolute;
            width: 300px;
            height: auto;
            animation: flyRocket 10s ease-in-out infinite;
        }

        @keyframes flyRocket {
        
        0% {
            top: 100px; 
            left: -70px;
            transform: rotate(-30deg);
        }

        10%{
            top: 80px; 
            left: -70px;
            transform: rotate(-30deg);
        }
        20% {
            top: 60px; 
            left: -70px;
            transform: rotate(-30deg);
        }
        30% {
            top: -300px; 
            left: 70px;
            transform: rotate(0deg);       
        } 
        40% {
            top: -300px;
            left: 1000px;
            transform: rotate(145deg);  
            
        }
        50% {
            top: 0px;
            left: 1200px;
            transform: rotate(180deg);   
        }
        
        60% {
            top: 600px;
            left: 1000px; 
            transform: rotate(180deg);
        }
        70% {
            top: 800px;
            left: 800px; 
            transform: rotate(245deg); 
        }
        80% {
            top: 400px;
            left: 200px; 
            transform: rotate(275deg);
        }
        90% {
            top: 200px;
            left: -400px; 
            transform: rotate(275deg); 
        }       
        100% {
            top: 100px; 
            left: -70px;
            transform: rotate(-30deg);
        }*/
    }
    </style>
    <script>
        quizid = new URLSearchParams(window.location.search).get('id');
        qnum = parseInt(new URLSearchParams(window.location.search).get('q')) || 0;

        function fetchQuestion() {
            // Make an AJAX request to get the next question
            fetch(`get_question.php?id=${quizid}&q=${qnum}`)
                .then(response => response.json())
                .then(data => {
                    // Update the question and choices on the page
                    document.getElementById('Question').innerText = data.question;
                    document.getElementById('answer1').innerText = data.choices[0];
                    document.getElementById('answer2').innerText = data.choices[1];
                    document.getElementById('answer3').innerText = data.choices[2];
                    document.getElementById('answer4').innerText = data.choices[3];
                    document.getElementById('answer1').value = data.values[0];
                    document.getElementById('answer2').value = data.values[1];
                    document.getElementById('answer3').value = data.values[2];
                    document.getElementById('answer4').value = data.values[3];
                    document.getElementById('answer1').onclick = function () {
                        nextQuestion(data.values[0]);
                        console.log(data.values[0]);
                    };
                    document.getElementById('answer2').onclick = function () {
                        nextQuestion(data.values[1]);
                        console.log(data.values[1]);
                    };
                    document.getElementById('answer3').onclick = function () {
                        nextQuestion(data.values[2]);
                        console.log(data.values[2]);
                    };
                    document.getElementById('answer4').onclick = function () {
                        nextQuestion(data.values[3]);
                        console.log(data.values[3]);
                    };
                    
                    // Update the current question number and total questions
                    document.getElementById('questionnum').innerText =  `Question ${data.qnum}/${data.amount}`;

                    // Update the question number for the next request
                    qnum = data.qnum;

                    submitButton = document.getElementById('Submit');
                    if (qnum === data.amount) {
                        submitButton.style.display = 'inline-block'; // Show button
                    } else {
                        submitButton.style.display = 'none'; // Hide button
                    }

                })
                .catch(error => console.error('Error fetching question:', error));
        }

        // Function to go to the next question
        function nextQuestion(value) {
            console.log(value);
            fetchQuestion();
        }

        function prevQuestion() {
            if (qnum-1 > 0) { // Ensure we don't go below the first question
                qnum=qnum-2; // Decrement question number
                fetchQuestion();
            } else {
                console.log('Already at the first question.');
            }
        }
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
    </header>

    <nav class="navbar">
        <a href="Home.php">HOME</a>
        <a href="Option.php">QUIZZES</a>
        <a href="DashBoard.php">DASHBOARD</a>
        <a href="MyProfile.php">MY PROFILE</a>
        <a href="Login.php">LOGOUT</a>
    </nav>
    <main>
        <div id="main">
            <div id="time">Time Left &#9200 : <span id="time-left"> <?php echo $time_remain; ?>:00<span></div>
            <div id="Next">
                <button class="NextB" onclick="prevQuestion()"> < </button><span id="questionnum"> Question <?php echo $qnum; ?>/<?php echo $amount; ?></span>
                <button class="NextB" onclick="nextQuestion()"> > </button></div>
            <div id="Question"><?php echo $question_text; ?></div>
            <!-- <form method="post" onsubmit="return false"> -->
            <div id="container">
                <button class="Option" onclick="nextQuestion(<?php echo $choiceidArray[0]; ?>)" name="answerBtn">A. <span id="answer1"><?php echo $choiceArray[0]; ?></span></button>
                <button class="Option" onclick="nextQuestion(<?php echo $choiceidArray[1]; ?>)" name="answerBtn">B. <span id="answer2"><?php echo $choiceArray[1]; ?></span></button>
                <button class="Option" onclick="nextQuestion(<?php echo $choiceidArray[2]; ?>)" name="answerBtn">C. <span id="answer3"><?php echo $choiceArray[2]; ?></span></button>
                <button class="Option" onclick="nextQuestion(<?php echo $choiceidArray[3]; ?>)" name="answerBtn">D. <span id="answer4"><?php echo $choiceArray[3]; ?></span></button>
            </div>
            <!-- </form> -->
            <button name="submitBtn" id="Submit" class="Submit" onclick="endTimer()" style="display: none;">Submit</button>
            
        </div>
        <div class="loop-wrapper">
    <div class="mountain"></div>
    <div class="hill"></div>
    <div class="tree"></div>
    <div class="tree"></div>
    <div class="tree"></div>
    <div class="rock"></div>
    <div class="truck"></div>
    <div class="wheels"></div>
  </div> 
    </main>
    <img id="rocket" src="../images/Rocket.png" alt="rocket">
    <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>

    <script> //timer
        timerElement=document.getElementById('time-left');
        timeLeft=<?php echo $time_remain; ?>*60;

        function startTimer() {
        const timerInterval = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert('Time is up!');
            } else {
                timeLeft--;
                minutes = Math.floor(timeLeft / 60);
                seconds = timeLeft % 60;
                timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }
        }, 1000);
        }

        function endTimer(){
            remaining_time=timeLeft/60;
            window.location.href='QuizSummary.php?time='+remaining_time;
        }

        startTimer();
    </script>
</body>
</html>
