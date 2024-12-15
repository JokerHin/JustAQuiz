<?php
include('../../main.php');
include('../session.php');


?>
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
        <button id="view-report" onclick="window.location.href='Report.php'">View Report</button>
    </header>

    <nav class="navbar">
        <a href="Home.php">HOME</a>
        <a href="Option.php">QUIZZES</a>
        <a href="DashBoard.php">DASHBOARD</a>
        <a href="MyProfile.php">MY PROFILE</a>
        <a href="Login.php">LOGOUT</a>
    </nav>
    <section>
            <div class='air air1'></div>
            <div class='air air2'></div>
            <div class='air air3'></div>
            <div class='air air4'></div>
      </section>
    <main> 
        <div class="quiz-id">
            <span>JOIN QUIZ? ENTER QUIZID: </span>
            <input type="text" placeholder="Enter ID">
        </div>
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                  <?php
                    $student_id = $_SESSION['user_id'];
                    $sql = "SELECT q.subject, q.title, q.description, r.date, r.feedback, a.attempt_id FROM Attempt a INNER JOIN Quiz q ON a.quiz_id = q.quiz_id INNER JOIN Result r ON r.attempt_id = a.attempt_id WHERE a.student_id = ? AND a.stat = 'completed' ORDER BY r.date DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    if ($result->num_rows > 0) { //not fixed
                      while ($row = $result->fetch_assoc()) {
                          $subject = htmlspecialchars($row['subject']);
                          $title_description = htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['description']);
                          $score = calculate_score($row['attempt_id'], $conn);
                          $total_questions = total_question($row['attempt_id'], $conn);
                          if ($total_questions>0){
                            $quiz_summary = ($score / $total_questions) * 100 . "%";
                          }else{
                            $quiz_summary = "0%";
                          }
                          $grade = calculate_grade($score, $total_questions);
                          $used_time = calculate_used_time($row['attempt_id'], $conn) . "s";
                          $date = htmlspecialchars($row['date']);
                          $feedback = htmlspecialchars($row['feedback']);
                          echo "<tr>";
                          echo "<th scope='col'>$subject</th>";
                          echo "<th scope='col'>$title_description</th>";
                          echo "<th scope='col'>$quiz_summary</th>";
                          echo "<th scope='col'>$grade</th>";
                          echo "<th scope='col'>$used_time</th>";
                          echo "<th scope='col'>$date</th>";
                          echo "<th scope='col'>$feedback</th>";
                      }
                    }
                  ?>
                  <tr>
                    <th scope="col">Subject</th>
                  </tr>
                  <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Title-Description</th>
                    <th scope="col">Quiz Summary</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Time Taken</th>
                    <th scope="col">Completion Date</th>
                    <th scope="col">Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row" class="row">HTML</th>
                    <th scope="row" class="row">What is HTML?</th>
                    <td>100%</td>
                    <td>A</td>
                    <td>300s</td>
                    <td>17 October 2024</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">HTML</th>
                    <th scope="row" class="row">The &lt;form&gt; Element</th>
                    <td>80%</td>
                    <td>B</td>
                    <td>240s</td>
                    <td>23 October 2024</td>
                    <td>Well done</td>
                  </tr>
                  <tr>
                    <th scope="row" class="row">CSS</th>
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
