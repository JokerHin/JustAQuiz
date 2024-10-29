<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="Overview.css">
    <script>
        function tab(t) {
            if (t == 1) {
                document.getElementById('content1').style.display = 'block';
                document.getElementById('content2').style.display = 'none';
                document.getElementById('tab1').style.background = 'wheat';
                document.getElementById('tab2').style.background = 'white';
            }
            else if (t == 2) {
                document.getElementById('content1').style.display = 'none';
                document.getElementById('content2').style.display = 'block';
                document.getElementById('tab1').style.background = 'wheat';
                document.getElementById('tab2').style.background = 'white';
            };
        }
    </script>
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">Overview</h1>
        </div>
        <div id="info"></div>
    </header>

    <nav class="navbar">
        <a href="InstructorHome.php">HOME</a>
        <a href="InstructorCreateQuiz.php">CREATE QUIZ</a>
        <a href="Overview.php">OVERVIEW</a>
        <a href="../User/Login.php">LOGOUT</a>
    </nav>

    <main>
    <div id="main">
    <div class="flex-container-top">
        <div class="tab" id="tab1" onclick="tab(1)">Quizzes</div>
        <div class="tab" id="tab2" onclick="tab(2)">Quizzes Attempts</div>
        </div>
        <div class="flex-container-bottom">
        <div class="content" id="content1" style="overflow-x: auto;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Total Questions</th>
                    <th scope="col">Date Created</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="row">Introduction</th>
                    <td>What is HTML?</td>
                    <td>10</td>
                    <td>10 October 2024</td>
                    <td><a>Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">Form</th>
                    <td>The form element</td>
                    <td>10</td>
                    <td>12 October 2024</td>
                    <td><a>Edit</a></td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">images</th>
                    <td>HTML images Syntax</td>
                    <td>10</td>
                    <td>16 October 2024</td>
                    <td><a>Edit</a></td>
                  </tr>
                </tbody>
              </table>  
            </div>
        </div>
        <div class="content" id="content2" style="overflow-x: auto;">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Badges Collected</th>
                    <th scope="col">Quizzes Completed</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ST12345</td>
                    <td><a>Yong</a></td>
                    <td>12</td>
                    <td>50<td>
                  </tr>
                  <tr>
                    <td>ST12345</td>
                    <td><a>Yong</a></td>
                    <td>12</td>
                    <td>50<td>
                  </tr>
                  <tr>
                    <td>ST12345</td>
                    <td><a>Yong</a></td>
                    <td>12</td>
                    <td>50<td>
                  </tr>
                </tbody>
              </table>  
        </div>
        </div>
    </main>
</body>
</html>