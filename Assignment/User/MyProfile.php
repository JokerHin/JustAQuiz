<?php
include("../../main.php");
include('../session.php');
$id = user_profile($conn, "user_id");
$name = user_profile($conn, "name");
$email = user_profile($conn, "email");
$total_quiz = total_quiz_done($id,$conn);
$total_html = total_quiz_done($id,$conn,"HTML");
$total_css = total_quiz_done($id,$conn,"CSS");
$total_badges = calculate_total_badges_collected($id,$conn);
echo "<script>console.log('$name');</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustAQuiz</title>
    <link rel="stylesheet" href="MyProfile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
    </header>

    <nav class="navbar">
        <a href="Home.php">HOME</a>
        <a href="Option.php">QUIZZES</a>
        <a href="DashBoard.php">DASHBOARD</a>
        <a href="MyProfile.php">MY PROFILE</a>
        <!-- <a href="logout.php">LOGOUT</a> -->
    </nav>

    <main> 
        <div id="container">
            <div id="left">
            <div class="profilepic">
            <img class="profilepic__image" src="https://images.unsplash.com/photo-1510227272981-87123e259b17?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&s=3759e09a5b9fbe53088b23c615b6312e" width="150" height="150" alt="Profibild" />
            <div class="profilepic__content">
                <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                <span class="profilepic__text">Edit Profile</span>
            </div>
            </div>
                <div id="down">StudentID : <span id="info1"><?php echo $id; ?></span> 
                <br> Name : <span id="info2"><?php echo $name; ?></span>
                <br> Email : <span id="info3"><?php echo $email; ?></span>
                <!-- <br> Password : <span id="info4">Hidden</span> -->
            </div>
            </div>
            <div id="right">
                <div class="box">Total Quizzes Played <br><span id="input1"><?php echo $total_quiz; ?></span></div>
                <div class="box">HTML Quizzes Played <br><span id="input2"><?php echo $total_html; ?></span></div>
                <div class="box">Badge Collected <br><span id="input3"><?php echo $total_badges; ?></span></div>
                <div class="box">CSS Quizzes Played <br><span id="input4"><?php echo $total_css; ?></span></div>
                <button class="delete" onclick="window.location.href='../logout.php'">Logout </button>
                <button class="delete" onclick="window.location.href='Login.php'">Delete Account </button>
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
