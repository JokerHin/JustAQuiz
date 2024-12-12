<?php
include('../../main.php');
include('../session.php');
if (isset($_GET['id']) && isset($_GET['q'])) {
    $quizid = intval($_GET['id']);
    $qnum = intval($_GET['q']);
    $amount=total_question($quizid, $conn);

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
        // Debug or process
        echo "<script>console.log('Question ID: $cid, Text: $text');</script>";
    }
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
            <div id="time">Time Left &#9200 : <span id="time-left"> 01.55<span></div>
            <div id="Next"><button class="NextB"> < </button> Question <?php echo $qnum; ?>/<?php echo $amount; ?> <button class="NextB"> > </button></div>
            <div id="Question"><?php echo $question_text; ?></div>
            <div id="container">
                <button class="Option">A. <span id="answer1"><?php echo $choiceArray[0]; ?></span></button>
                <button class="Option">B. <span id="answer2"><?php echo $choiceArray[1]; ?></span></button>
                <button class="Option">C. <span id="answer3"><?php echo $choiceArray[2]; ?></span></button>
                <button class="Option">D. <span id="answer4"><?php echo $choiceArray[3]; ?></span></button>
            </div>
            <?php
                //submit button appear or not
                if ($qnum==$amount){
                    echo '<button class="Submit" onclick="window.location.href=\'QuizSummary\'">Submit</button>';
                }
            ?>
            
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
</body>
</html>
