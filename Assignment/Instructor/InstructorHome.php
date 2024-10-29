<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="InstructorHome.css">
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">Home</h1>
        </div>
        <div id="button" onclick="window.location.href='http://localhost/RWDD/Assignment/Instructor/InstructorCreateQuiz.php'"><button class="create-quiz">CREATE QUIZ</button></div>
    </header>

    <nav class="navbar">
        <a href="InstructorHome.php">HOME</a>
        <a href="InstructorCreateQuiz.php">CREATE QUIZ</a>
        <a href="Overview.php">OVERVIEW</a>
        <a href="../User/Login.php">LOGOUT</a>
    </nav>

    <main>
    <div class="container">
        <div class="left-container">
            <div class="box">
                <p class="update">Last updated: Oct 22, 2024</p>
                <p class="number">103</p>
                <p class="Total">Total Quizzes Created</p>
                <a class="link">VIEW</a>
            </div>
            <div class="box">
                <p class="update">Last updated: Oct 22, 2024</p>
                <p class="number">98</p>
                <p class="Total">Total Attempts</p>
                <a class="link">VIEW</a>
            </div>
        </div>
        <div class="right-container">
            <div class="profile-box">
                <div id="up"></div>
                <div id="down">
                    Instructor ID: <span id="info1">123456</span> 
                    <br> Name : <span id="info2">Yong Wai</span> 
                    <br> Email : <span id="info3">yongwai@gmail.com</span>
                    <br> Password : <span id="info4">********</span><br>
                    <button class="del-button">Delete Account</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html>