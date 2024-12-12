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
        <a href="Login.php">LOGOUT</a>
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
                <div id="down">StudentID : <span id="info1"></span> <br> Name : <span id="info2"></span> <br> Email : <span id="info3"></span><br> Password : <span id="info4"></span><br> Instructor : <span id="info5"></span></div>
            </div>
            <div id="right">
                <div class="box">Total Quizzes Played <br><span id="input1">0</span></div>
                <div class="box">HTML Quizzes Played <br><span id="input2">0</span></div>
                <div class="box">Badge Collected <br><span id="input3">0</span></div>
                <div class="box">CSS Quizzes Played <br><span id="input4">0</span></div>
                <button class="delete" onclick="window.location.href='http://localhost/RWDD/Assignment/User/Login.php'">Logout </button>
                <button class="delete" onclick="window.location.href='http://localhost/RWDD/Assignment/User/Login.php'">Delete Account </button>
            </div>
        </div>
        <div class="popup"> 
        <div class="popup-content">
            <form>
            <img id="close-button" src="../images/close.png" alt="close-button">
            <h2>Profile</h2>
            <hr>
            
            <div class="input-info">
                <label for="basic-name">Name</label>
                <input type="text" id="basic-name" placeholder="Name" name="name" required />
            </div>
            
            <div class="input-info">
                <label for="additional-info">Email</label>
                <input type="text" id="additional-info" placeholder="Email" name="Email" required/>
            </div>
            
            <div class="input-info">
                <label for="custom-label">Password</label>
                <input type="text" id="custom-label" placeholder="Password" name="Password" required />
            </div>

            <div class="images-container">
                <label for="images" class="drop-container" id="dropcontainer">
                <p class="drop-title">Drop files here</p>
                or
                <br>
                <input type="file" id="images" accept="image/*">
                </label>
            </div>
            
            <div class="button-container">
                <button type="submit" class="update-button">Update</button>
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
    <script src=MyProfile.js></script>
</body>
</html>
