<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="UserManagement.css">
    <script>
        function tab(t) {
            if (t == 1) {
                document.getElementById('content1').style.display = 'block';
                document.getElementById('content2').style.display = 'none';
                document.getElementById('content3').style.display = 'none';
                document.getElementById('tab1').style.background = '#D5F3FE';
                document.getElementById('tab2').style.background = '#66D3FA';
                document.getElementById('tab3').style.background = '#3CAEA3';
            }
            else if (t == 2) {
                document.getElementById('content1').style.display = 'none';
                document.getElementById('content2').style.display = 'block';
                document.getElementById('content3').style.display = 'none';
                document.getElementById('tab1').style.background = '#D5F3FE';
                document.getElementById('tab2').style.background = '#66D3FA';
                document.getElementById('tab3').style.background = '#3CAEA3';
            }
            else if (t == 3) {
                document.getElementById('content1').style.display = 'none';
                document.getElementById('content2').style.display = 'none';
                document.getElementById('content3').style.display = 'block';
                document.getElementById('tab1').style.background = '#D5F3FE';
                document.getElementById('tab2').style.background = '#66D3FA';
                document.getElementById('tab3').style.background = '#3CAEA3';
            };
        }
    </script>
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
    </header>

    <nav class="navbar">
        <a href="AdminHome.php">HOME</a>
        <a href="AdminCreateQuiz.php">CREATE QUIZ</a>
        <a href="UserManagement.php">MANAGEMENT</a>
        <a href="Badges.php">BADGES</a>
        <a href="../User/Login.php">LOGOUT</a>
    </nav>

    <main>
    <div id="main">
        <div class="flex-container-top">
          <div class="tab" id="tab1" onclick="tab(1)">Quizzes</div>
          <div class="tab" id="tab2" onclick="tab(2)">Instructor</div>
          <div class="tab" id="tab3" onclick="tab(3)">Students</div>
        </div>
        <div class="flex-container-bottom">
          <div class="content" id="content1" style="overflow-x: auto;">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">QuizID</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Title-Description</th>
                      <th scope="col">Total Questions</th>
                      <th scope="col">Date Created</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="row">01</th>
                      <td>HTML</td>
                      <td>Introduction -  What is HTML?</td>
                      <td>10</td>
                      <td>10 October 2024</td>
                      <td><a class="edit">Edit</a></td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                    <th scope="row" class="row">01</th>
                      <td>HTML</td>
                      <td>Introduction -  What is HTML?</td>
                      <td>10</td>
                      <td>10 October 2024</td>
                      <td><a class="edit">Edit</a></td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                      <th scope="row" class="row">01</th>
                        <td>HTML</td>
                        <td>Introduction -  What is HTML?</td>
                        <td>10</td>
                        <td>10 October 2024</td>
                        <td><a class="edit">Edit</a></td>
                        <td class="bin"></td>
                    </tr>
                  </tbody>
                </table>  
            </div>
          <div class="content" id="content2" style="overflow-x: auto;">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Instructor ID</th>
                      <th scope="col">Instructor Name</th>
                      <th scope="col">Badges Collected</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="row">INST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                      <th scope="row" class="row">INST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                      <th scope="row" class="row">INST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td class="bin"></td>
                    </tr>
                  </tbody>
                </table>  
              </div>
          <div class="content" id="content3" style="overflow-x: auto;">
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
                      <th scope="row" class="row">ST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td>50</td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                      <th scope="row" class="row">ST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td>50</td>
                      <td class="bin"></td>
                    </tr>
                    <tr>
                      <th scope="row" class="row">ST12345</th>
                      <td>Yong</td>
                      <td>12</td>
                      <td>50</td>
                      <td class="bin"></td>
                    </tr>
                  </tbody>
                </table>  
          </div>
        </div>
      </div>
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