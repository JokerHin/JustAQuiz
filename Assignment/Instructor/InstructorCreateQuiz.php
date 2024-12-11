<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="InstructorCreateQuiz.css">
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
    </header>

    <nav class="navbar">
        <a href="InstructorHome.php">HOME</a>
        <a href="InstructorCreateQuiz.php">CREATE QUIZ</a>
        <a href="Overview.php">OVERVIEW</a>
        <a href="../User/Login.php">LOGOUT</a>
    </nav>

    <main>
        <div class="main">
            <div class="flex-container-left">
            <div class="tab">Add Question</div>
            </div>
            <div class="flex-container-right">
            <p>CHOOSE QUIZ TYPE</p>
            <div class="container2">
                <form class="toggle">  
                    <input type="radio" id="choice1" name="choice" value="creative">
                    <label for="choice1">HTML</label>
            
                    <input type="radio" id="choice2" name="choice" value="productive">
                    <label for="choice2">CSS</label>
            
                    <div id="flap"><span class="content">HTML</span></div>     
                </form>            
            </div> 
            <input type="text" placeholder="Type Quiz Title here" class="TextBox">
            <input type="text" placeholder="Type Quiz Description here" class="TextBox">
            </div>
        </div>

        <div class="mainQ">
            <div class="Question-container-left">
            <div class="tabQ1">Delete Question</div>
            <div class="tabQ2">Add Question</div>
            </div>
            <div class="Question-container-right">
                <div class="container">
                    <span class="Question-num">Q1</span>
                    <input type="text" class="Question" placeholder="Type Question Here"></input>
                    <div class="Option-box">
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                    </div>
                </div>
            </div>   
        </div>
        <div class="mainQ">
            <div class="Question-container-left">
            <div class="tabQ1">Delete Question</div>
            <div class="tabQ2">Add Question</div>
            </div>
            <div class="Question-container-right">
                <div class="container">
                    <span class="Question-num">Q1</span>
                    <input type="text" class="Question" placeholder="Type Question Here"></input>
                    <div class="Option-box">
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                        <input type="text" class="Option" placeholder="A. Type Answer Here"> <input type="radio" ></input></input>
                    </div>
                </div>
            </div>   
        </div>
        <button class="Create-Quiz" >Create-Quiz</button>
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
    <script src="InstructorCreateQuiz.js"></script>
</body>
</html>