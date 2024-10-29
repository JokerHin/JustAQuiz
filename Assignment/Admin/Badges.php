<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="Badges.css">
</head>
<body>
    <header>
    <div class="logo">
            <div id="h1">JUST</div><div id="h2">A</div><div id="h3">QUIZ</div>
        </div>
        <div >
            <h1 id="Title">Badges</h1>
        </div>
        <div id="info"></div>
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
                <h2>CREATE BADGE</h2>
                <form>
                    <input type="text" placeholder="Name" id="badge-name">
                    <input type="text" placeholder="Category" id="badge-category">
                    <input type="number" placeholder="Grade" id="badge-grade">
                    <input type="file" id="badge-image" accept=".png">
                    <button id="create-badge">CREATE</button>
                </form>
            </div>
            <div class="right-container">
                <h2>BADGES</h2>
                <div class="badge-container">
                    <div class="box">
                        <img src="../images/CSS-Badge.png" alt="CSS Knight Badge">
                        <div class="box-word">
                            <p>Name: :CSS Kinight</p>
                            <p>Category: CSS</p>
                            <p>Grade: 100</p>
                            <p>Date created : 10/22/2024</p>
                        </div>
                        <button class="del-button">Delete</button>
                    </div>
                    <div class="box">
                        <img src="../images/CSS-Badge.png" alt="CSS Knight Badge">
                        <div class="box-word">
                            <p>Name: :CSS Kinight</p>
                            <p>Category: CSS</p>
                            <p>Grade: 100</p>
                            <p>Date created : 10/22/2024</p>
                        </div>
                        <button class="del-button">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>