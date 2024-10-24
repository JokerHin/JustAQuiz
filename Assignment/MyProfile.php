<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="MyProfile.css">
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">MyProfile</h1>
        </div>
        <div id="info">Welcome !!!   Name </div>
    </header>

    <nav class="navbar">
        <a href="Home.php">Home</a>
        <a href="Option.php">Quizzes</a>
        <a href="DashBoard.php">Dashboard</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="Login.php">Logout</a>
    </nav>

    <main> 
        <div id="container">
            <div id="left">
                <div id="up"></div>
                <div id="down">StudentID : <span id="info1"></span> <br> Name : <span id="info2"></span> <br> Email : <span id="info3"></span><br> Password : <span id="info4"></span><br> Instructor : <span id="info5"></span></div>
            </div>
            <div id="right">
                <div class="box">Total Quizzes Played <br><span id="input1">0</span></div>
                <div class="box">Level <br><span id="input2">0</span></div>
                <div class="box">HTML Quizzes Played <br><span id="input3">0</span></div>
                <div class="box">Badge Collected <br><span id="input4">0</span></div>
                <div class="box">CSS Quizzes Played <br><span id="input5">0</span></div>
                <button class="delete">Delete Account </button>
            </div>
        </div>
    </main>
</body>
</html>
