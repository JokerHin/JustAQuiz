<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="Home.css">
    <style>
        #picture1 {
            justify-content: center;
            align-items: center;
            background-image: url(../images/RemoveJustAQuiz.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100% cover;
            width: 100%;
            height: 500px;  
            border: 3px solid rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: 0 0 30px white;
        }

        #rocket {
            position: absolute;
            width: 300px;
            height: auto;
            animation: flyRocket 10s ease-in-out infinite; 
        }

        @keyframes flyRocket {
        
        0% {
            top: 550px; 
            left: 670px;
            transform: rotate(-30deg);
        }

        10%{
            top: 450px; 
            left: 670px;
            transform: rotate(-30deg);
        }
        20% {
            top: -300px;
            left: 1000px;
            transform: rotate(45deg);
        }
        30% {
            top: -100px;
            left: 1300px;
            transform: rotate(145deg);         
        } 
        40% {
            top: 700px;
            left: 1300px; 
            transform: rotate(180deg);
            
        }
        50% {
            top: 1000px;
            left: 900px; 
            transform: rotate(245deg);     
        }
        
        60% {
            top: 700px;
            left: 200px; 
            transform: rotate(245deg);
        }
        70% {
            top: 400px;
            left: -200px;
            transform: rotate(275deg); 
        }
        80% {
            top: 100px;
            left: 100px; 
            transform: rotate(360deg); 
        }
        90% {
            top: 300px;
            left: 400px;
            transform: rotate(200deg); 
        }       
        100% {
            top: 550px; 
            left: 670px;
            transform: rotate(-30deg);
        }
    }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div class="quiz-id">
            <span>JOIN QUIZ? ENTER QUIZID: </span>
            <input type="text" placeholder="Enter ID">
        </div>
        <nav>
            <div class="btn"><a href="Login.php">Login</a></div>
        </nav>
    </header>

    <nav class="navbar">
        <a href="Home.php">HOME</a>
        <a href="Option.php">QUIZZES</a>
        <a href="DashBoard.php">DASHBOARD</a>
        <a href="MyProfile.php">MY PROFILE</a>
        <a href="Login.php">LOGOUT</a>
    </nav>

    <main>
        <div id="picture1">
            <img id="rocket" src="../images/Rocket.png" alt="rocket">
        </div>      
        <div id=MainB><button class="Mainbutton" href="#cards" onclick="window.location.href='http://localhost/RWDD/Assignment/User/Option.php'">Let's Start</button></div>
        <section class="category">
            <h2>HTML</h2>
            <div class="cards">
                <div class="card">
                    <h3>Introduction</h3>
                    <p>What is HTML?</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Form</h3>
                    <p>The &lt;form&gt; Element</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Images</h3>
                    <p>HTML Images Syntax</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Classes</h3>
                    <p>Using The class Attribute</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <button id="See-All1" onclick="window.location.href='http://localhost/RWDD/Assignment/User/HTML.php'">See All</button>
            </div>
           
        </section>

        <section class="category">
            <h2>CSS</h2>
            <div class="cards">
                <div class="card">
                    <h3>Introduction</h3>
                    <p>What is CSS?</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Colors</h3>
                    <p>RGB, HEX, HSL</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Syntax</h3>
                    <p>Selector & Syntax</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <div class="card">
                    <h3>Text</h3>
                    <p>Formatting text</p>
                    <button class="button-73" role="button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/StartQuiz.php'">Play</button>
                </div>
                <button id="See-All2" onclick="window.location.href='http://localhost/RWDD/Assignment/User/CSS.php'">See All</button>
            </div>
            
        </section>      
    </main>
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
