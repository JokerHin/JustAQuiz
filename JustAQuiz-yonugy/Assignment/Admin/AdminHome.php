<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="AdminHome.css">
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div id="button" onclick="window.location.href='http://localhost/RWDD/Assignment/Admin/AdminCreateQuiz.php'"><button class="create-quiz">CREATE QUIZ</button></div>
    </header>

    <nav class="navbar">
        <a href="AdminHome.php">HOME</a>
        <a href="AdminCreateQuiz.php">CREATE QUIZ</a>
        <a href="UserManagement.php">MANAGEMENT</a>
        <a href="Badges.php">BADGES</a>
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
                <p class="number">1120</p>
                <p class="Total">Total Students</p>
                <a class="link">VIEW</a>
            </div>
            <div class="box">
                <p class="update">Last updated: Oct 22, 2024</p>
                <p class="number">2846</p>
                <p class="Total">Total Instructors</p>
                <a class="link">VIEW</a>
            </div>
            <div class="box">
                <p class="update">Last updated: Oct 22, 2024</p>
                <p class="number">20</p>
                <p class="Total">Total Badges Created</p>
                <a class="link">VIEW</a>
            </div>
        </div>
        <div class="right-container">
            <div class="profile-box">
            <div class="profilepic">
            <img class="profilepic__image" src="https://images.unsplash.com/photo-1510227272981-87123e259b17?ixlib=rb-0.3.5&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&s=3759e09a5b9fbe53088b23c615b6312e" width="150" height="150" alt="Profibild" />
            <div class="profilepic__content">
                <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                <span class="profilepic__text">Edit Profile</span>
            </div>
            </div>
                <div id="down">
                    Admin ID: <span id="info1">123456</span> 
                    <br> Name : <span id="info2">Yong Wai</span> 
                    <br> Email : <span id="info3">yongwai@gmail.com</span>
                    <br> Password : <span id="info4">********</span><br>
                    <button class="del-button" onclick="window.location.href='http://localhost/RWDD/Assignment/User/Login.php'">Delete Account</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup"> 
      <div class="popup-content">
        <form>
          <img id="close-button" src="../images/close.png" alt="close-button">
          <h2>Profile</h2>
          <hr>
        
          <div class="input-info">
            <label for="basic-name">Title</label>
            <input type="text" id="basic-name" placeholder="Song Title" name="Title-Name" required />
          </div>
        
          <div class="input-info">
            <label for="additional-info">Artist</label>
            <input type="text" id="additional-info" placeholder="Artist Name" name="Artist-Name" required/>
          </div>
        
          <div class="input-info">
            <label for="custom-label">URL (YouTube & MP3)</label>
            <input type="text" id="custom-label" placeholder="Song URL" name="URL" />
          </div>

          <label for="images" class="drop-container" id="dropcontainer">
            <span class="drop-title">Drop files here</span>
            or
            <input type="file" id="images" accept="image/*">
          </label>
        
          <div class="button-container">
            <button type="submit" class="upload-button">Upload</button>
          </div>
        </form>
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
    <script src="AdminHome.js"><script>
</body>
</html>