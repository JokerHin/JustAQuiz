<?php
include("../../main.php");
include('../session.php');
$display_attempt = display_attempt($conn);
$total_quiz = calculate_total_quiz_created($conn);
function view_available_quiz($conn) {
  $sql = "SELECT title, description, time_limit FROM quiz";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          // Sanitize output to prevent XSS attacks
          $title = htmlspecialchars($row['title']);
          $description = htmlspecialchars($row['description']);
          $total_questions = $total_quiz;
          $time_limit = htmlspecialchars($row['time_limit']);

          // Echo the HTML for each row
          echo "<tr>
                  <td>{$title}</td>
                  <td>{$description}</td>
                  <td>{$total_questions}</td>
                  <td>{$time_limit}</td>
                  <td><a href='InstructorCreateQuiz.php'>Edit</a></td>
                </tr>";
      }
  } else {
      // No quizzes available
      echo "<tr><td colspan='5'>No quiz available at the moment.</td></tr>";
  }
}
?>

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
                document.getElementById('tab1').style.background = '#D5F3FE';
                document.getElementById('tab2').style.background = 'white';
            }
            else if (t == 2) {
                document.getElementById('content1').style.display = 'none';
                document.getElementById('content2').style.display = 'block';
                document.getElementById('tab1').style.background = '#D5F3FE';
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
                    <th scope="col">Time Limit</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  // Ensure you have a valid database connection in $conn
                  view_available_quiz($conn);
                  ?>
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
                    <th scope="col">Title-Description</th>
                    <th scope="col">Time Spent</th>
                    <th scope="col">Give Feedback</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                    $display_attempt;
                    ?>
                  </tr>
                </tbody>
              </table>  
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
    <div class="popup-edit"> 
        <div class="popup-content">
            <img id="close-button" src="../images/close.png" alt="close-button">
            <h1>Feedback</h1>
            <input class="pop-up-input" type="text"></input>
            <button class="pop-up-submit">Submit</button>
        </div>
    </div>
    <script src="Overview.js"></script>
</body>
</html>