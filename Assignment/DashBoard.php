<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="DashBoard.css">
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">DASHBOARD</h1>
        </div>
        <div id="info">Quizzes Completed : <br> Badges Collection : </div>
    </header>

    <nav class="navbar">
        <a href="Home.php">Home</a>
        <a href="Option.php">Quizzes</a>
        <a href="DashBoard.php">Dashboard</a>
        <a href="MyProfile.php">My Profile</a>
        <a href="Login.php">Logout</a>
    </nav>

    <main> 
        <div class="quiz-id">
            <span>JOIN QUIZ? ENTER QUIZID: </span>
            <input type="text" placeholder="Enter ID">
        </div>
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Quiz Summary</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Time Taken</th>
                    <th scope="col">Completion Date</th>
                    <th scope="col">Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="row">What is HTML?</th>
                    <td>100%</td>
                    <td>A</td>
                    <td>300s</td>
                    <td>17 October 2024</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">The &lt;form&gt; Element</th>
                    <td>80%</td>
                    <td>B</td>
                    <td>240s</td>
                    <td>23 October 2024</td>
                    <td>Well done</td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">What is CSS</th>
                    <td>95%</td>
                    <td>A</td>
                    <td>300s</td>
                    <td>24 October 2024</td>
                    <td>Keep it up</td>
                  </tr>
                </tbody>
              </table>  
            </div>
    </main>
</body>
</html>
