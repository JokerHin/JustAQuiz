<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Rubik+Mono+One&display=swap');
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            
        }
        body {
            background-image: url("images/Background.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;

            }
        #container {
            width: 70%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            border: 3px solid rgb(0, 0, 0);
            border-radius: 20px;
            box-shadow: 0px 40px 0px 0px rgb(84, 91, 98);
            }
        #box{ 
            width: 50%;
            height: 450px;
            border-radius: 20px;
            justify-content: center;
            
        }
        #picture {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            display: block;
            border-radius: 20px;
        }
        #Login {
            width: 50%;
            background: white;
            border: 2px solid rgba(219, 209, 209);
            height: 450px;
            text-align: center;
            border-radius: 20px;
            padding: 30px 60px;
            font-family:'Times New Roman', Times, serif;
        }
        #Login h1 {
            margin-bottom: 10px;
        }
        #Login .input {
            width: 100%;
            height: 50px;
            margin-top: 30px;

        }
        .input input {
            width: 100%;
            height: 100%;
            border: 1px solid rgb(179, 162, 162);
            background: rgb(255, 255, 255);
            border-radius: 40px;
            font-size: 16px;
            padding: 20px 45px 20px 20px;
        }
        .input input::placeholder {
            color: rgb(196, 196, 196);
        }
        #login-link {
            margin-top: 10px;
            display: block;
            padding-right: 350px;
            float: left;
        }
        button {
            width: 40%;
            height: 45px;
            background: white;
            border: none;
            border-radius: 40px;
            box-shadow: 0 0 10px gray;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: rgb(188, 200, 211);
        }

        @media (max-width: 768px) {
    * {
        flex-direction: column;
        align-items: center;
    }
    #box, #Login {
        width: 100%;
    }
}
    
              
    </style>
</head>
<body>
    <div id="container" > 
        <div id="box" >
            <img id="picture" src="images/JustAQuiz.png" alt="JustAQuiz">
        </div>
        <div id="Login" >
            <form method="post" action="php_file">        
                <h1>Create your Account</h1>                
                <div class="input"><input type="text" name="Name" placeholder="Name" required></div>
                <div class="input"><input type="password" name="password" placeholder="Password" required></div>
                <div class="input"><input type="password" name="confirm-password" placeholder="confirm-password" required></div>
                <a href="Login.php" id="login-link">Login</a>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        
    </div>   
</body>
</html>