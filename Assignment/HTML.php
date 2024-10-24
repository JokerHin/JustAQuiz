<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="HTML.css">
    <style>
        #picture1 {
            justify-content: center;
            align-items: center;
            background-image: url(images/RemoveJustAQuiz.png);
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
            width: 350px;
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
            transform: rotate(330deg); 
        }
        90% {
            top: 300px;
            left: 400px;
            transform: rotate(360deg); 
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
            <a href="Login.html">Login</a>
        </nav>
    </header>

    <nav class="navbar">
        <a href="Home.php">Home</a>
        <a href="Option.php">Quizzes</a>
        <a href="DashBoard.php">Dashboard</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="Login.php">Logout</a>
    </nav>

    <main>
        <img id="rocket" src="images/Rocket.png" alt="rocket">     
        <section class="category">
            <h2>HTML</h2>
            <div class="cards">
                <div class="card">
                    <h3>Introduction</h3>
                    <p>What is HTML?</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Form</h3>
                    <p>The &lt;form&gt; Element</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Images</h3>
                    <p>HTML Images Syntax</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Classes</h3>
                    <p>Using The class Attribute</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Elements</h3>
                    <p>&lt;h1&gt; My first Heading &lt;h1&gt;</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Attribute</h3>
                    <p>name="value"</p>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Headings</h3>
                    <h4>Heading1</h4>
                    <h5>Heading2</h5>
                    <button class="button-73" role="button">Play</button>
                </div>
                <div class="card">
                    <h3>Paragraph</h3>
                    <p>&lt;p&gt; This is a paragraph. &lt;p&gt;</p>
                    <button class="button-73" role="button">Play</button>
                </div>
            </div>
            
        </section>
    </main>
</body>
</html>
