<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="AdminCreateQuiz.css">
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">Make A Quiz</h1>
        </div>
        <div id="info"></div>
    </header>

    <nav class="navbar">
        <a href="AdminHome.php">HOME</a>
        <a href="AdminCreateQuiz.php">CREATE QUIZ</a>
        <a href="UserManagement.php">MANAGEMENT</a>
        <a href="Badges.php">BADGES</a>
        <a href="../User/Login.php">LOGOUT</a>
    </nav>

    <main>
        <div class="main">
            <div class="flex-container-left">
            <div class="tab">Add Question</div>
            </div>
            <div class="flex-container-right">
            <p>CHOOSE QUIZ TYPE</p>
            <div id="radio">
            <input type="radio" id="HTML">HTML</label><br />
            <input type="radio" id="CSS" >CSS</label><br />
            </div>
            <input type="text" placeholder="Type Text Title here" id="TextBox">
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
</body>
</html>