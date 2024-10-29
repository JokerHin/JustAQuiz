<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="Quiz.css">
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">HTML TIME</h1>
        </div>
        <div id="info"></div>
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
            <div id="time-left">Time Left &#9200 : <br> 01.55</div>
            <div id="Next"><button class="NextB"> < </button> Question 2/25 <button class="NextB"> > </button></div>
            <div id="Question">What does HTML stand for?</div>
            <div id="container">
                <button class="Option">A. <span id="answer1"></span></button>
                <button class="Option">B. <span id="answer2"></span></button>
                <button class="Option">C. <span id="answer3"></span></button>
                <button class="Option">D. <span id="answer4"></span></button>
            </div>
            <button class="Submit" onclick="window.location.href='http://localhost/RWDD/Assignment/User/QuizSummary'">Submit</button>
        </div>
    </main>
</body>
</html>
