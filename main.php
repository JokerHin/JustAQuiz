<?php

session_start();

//connect to database
$servername = "localhost"; // if your 3306 port used liao change to this: 127.0.0.1:3307
$username = "root"; // i didnt set
$password = "";
$dbname = "justaquiz";

// create & check the connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // will terminate script
}


// Sign Up function  (6 javascript alert)
function sign_up($name, $password, $confirm_password, $email, $conn, $role="2") { // role id: 1 admin, 2 instructor 3 student
    // protect against xss server scripting attack ( not sure if needed)
    $name = htmlspecialchars($name);
    $password = htmlspecialchars($password);
    $email = htmlspecialchars($email);
    $confirm_password = htmlspecialchars($confirm_password);

    // username oni can have alphanumeric, space n underscore
    if (! preg_match("/^[a-zA-Z0-9 _]+$/", $name)){
        #echo // javascript alert box here
        return false;
    }

    if (strlen($name) > 15){
        # echo // javascript here
        return false;
    }


    // Check if username is unique
    $sql = "SELECT * FROM Users WHERE name = ? OR email = ?";
    $stmt = $conn->prepare($sql);  // use to execute satatement repeatedly with high efficiency
    $stmt->bind_param("ss", $name, $email); // tell dbase what the parameters are, sss means all data type, s string, d double, i int, b blob
    $stmt->execute();
    $result = $stmt->get_result(); // get result with same user name
    if ($result->num_rows > 0) {
        #echo // javascript alert box here
        return false;
    }

    if ($password !== $confirm_password) {
        # echo // javascript alert box here ;
        return false;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // prevent sql injection
    $sql = "INSERT INTO Users (role_id, name, email, password_hash) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $role, $name, $email, $hashed_password);

    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


# login function (3 javascript alert)
function login($email, $password, $conn){
    $username = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc(); // get the result row as an array form, column name with the value
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            #echo // javascript alert box here;
            return true; //dk should return true or role_id bcz they have different interface
        } else { // wrong password here
            #echo // javascript alert box here;
            return false;
        }
    } else { // not sign up yet
        #echo // javascript alert box here;
        return false;
    }
}


// Logout function (1 javascript alert)
function logout_user(){ //not used
    session_unset();
    session_destroy();
    #echo // javascript alert box here
    return true;
}


// Delete User (2 javascript alert)
function delete_user($user_id, $conn) {
    $user_id = htmlspecialchars($user_id);

    $sql = "DELETE FROM Users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) { // make sure logout already
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id) { // session is set and user id = delete account id
            logout_user();
        }
        #  echo // javascript alert box here
        return true;
    } else { // cant delete account
        # echo // javascript alert box here
        return false;
    }
}


// Update User Function (change username or password or email) (4 javascript alert)
function update_user($user_id, $updated_data, $conn){
    $new_name = htmlspecialchars($updated_data['name']);
    $new_password = htmlspecialchars($updated_data['password']);
    $new_email = htmlspecialchars($updated_data['email']);


    // new de name mst be unique
    $sql = "SELECT * FROM Users WHERE name = ? AND user_id != ?"; //make sure the username not own by yourself
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_name, $user_id); // str n int
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { //username exists liao
        #echo // javascript alert box here
        return false;
    }

    // Ensure the new email is unique
    $sql = "SELECT * FROM Users WHERE email = ? AND user_id != ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_email, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { // email exists
        # echo // javascript alert here
        return false;
    }

    // Update user information
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE Users SET name = ?, password_hash = ?, email = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $new_name, $hashed_password, $new_email, $user_id);

    if ($stmt->execute()) {
        #echo // javascript alert here
        return true;
    } else {
        #echo // javascript alert here
        return false;
    }
}


// Forgot Password Function
function forgot_password($email, $new_password, $conn){
    $email = htmlspecialchars($email);
    $new_password = htmlspecialchars($new_password);

    // Check email exists anot
    $sql = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE Users SET password_hash = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        if ($stmt->execute()) {
            # echo // javascript alert box here
            return true;
        } else {
            # echo // javascript alert box here
            return false;
        }
    } else { // email no found
        # echo // javascript alert box
        return false;
    }
}


// create quiz function (3 javascript alert)
function create_quiz($title, $description, $subject, $time_limit,  $conn){
    if (!isset($_SESSION['user_id'])) { //make sure admin/instructor login liao
        # echo // javascript alert box here
        return false;
    }

    $creator_id = $_SESSION['user_id'];

    $sql = "INSERT INTO Quiz (creator_id, title, description, subject, time_limit) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssi", $creator_id, $title, $description, $subject, $time_limit);
    if ($stmt->execute()) {
        $_SESSION['quiz_id'] = $conn->insert_id; // get auto increment quiz id
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// edit quiz function (2 javascript alert)
function edit_quiz($quiz_id, $updated_data, $conn) {
    // prevent instructor doing bad thing
    $title = htmlspecialchars($updated_data['title']);
    $description = htmlspecialchars($updated_data['description']);
    $subject = htmlspecialchars($updated_data['subject']);
    $time_limit = htmlspecialchars($updated_data['time_limit']);

    $sql = "UPDATE Quiz SET title = ?, description = ?, subject = ?, time_limit = ? WHERE quiz_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $title, $description, $subject, $time_limit, $quiz_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Delete Quiz Function (2 javascript alert box here)
function delete_quiz($quiz_id, $conn) {
    $sql = "DELETE FROM Quiz WHERE quiz_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $quiz_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// end quiz create function (2 javascript alert box here)
function end_quiz_create(){
    if (isset($_SESSION['quiz_id'])) {
        unset($_SESSION['quiz_id']); // remove session quiz id
        # echo // javascript alert box here (quiz complete create liao)
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Add question function (2 js alert box here)
function add_question($question_text, $conn) {
    if (!isset($_SESSION['quiz_id'])) { // no quiz selected (bug)
        # echo // javascript alert box here
        return false;
    }

    $quiz_id = $_SESSION['quiz_id'];
    $question_text = htmlspecialchars($question_text);

    $sql = "INSERT INTO Question (quiz_id, question_text) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $quiz_id, $question_text);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Delete Question Function (2 js alert box)
function delete_question($quiz_id, $question_id, $conn) {
    // Delete the specific question
    $sql = "DELETE FROM Question WHERE question_id = ? AND quiz_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $question_id, $quiz_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        #echo // js alert box here
        return false;
    }
}


// Update Question Function (2 javascript alert box)
function update_question($question_id, $question_text, $conn) { // question id pass with html
    $question_text = htmlspecialchars($question_text);
    $quiz_id = $_SESSION['quiz_id'];

    $sql = "UPDATE Question SET question_text = ? WHERE question_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $question_text, $question_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Add Choice Function (2 javascript alert box)
function add_choice($question_id, $choice_text, $is_correct, $conn) {
    $choice_text = htmlspecialchars($choice_text);

    $sql = "INSERT INTO Choices (question_id, text, is_correct) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $question_id, $choice_text, $is_correct);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Edit Choice Function (2 javascript alert box here)
function edit_choice($choice_id, $new_text, $is_correct, $conn) {
    $new_text = htmlspecialchars($new_text);

    $sql = "UPDATE Choices SET text = ?, is_correct = ? WHERE choice_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $new_text, $is_correct, $choice_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Create Badge Function (gpt, not sure correct anot)
function create_badge($creator_id, $achievement_name, $category, $badge_file, $conn) {
    $creator_id = $_SESSION['user_id'];
    $achievement_name = htmlspecialchars($achievement_name);
    $category = htmlspecialchars($category);
    $badge_image = file_get_contents($badge_file['tmp_name']);
    $image_type = htmlspecialchars($badge_file['type']);

    $sql = "INSERT INTO Badges (creator_id, achievement_name, category, badge_image, image_type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $creator_id, $achievement_name, $category, $badge_image, $image_type);
    if ($stmt->execute()) {
        #echo // javascript alert box here
        return true;
    } else {
        #echo // javascript alert box here
        return false;
    }
}


// Delete Badge Function
function delete_badge($badge_id, $conn) {
    $sql = "DELETE FROM Badges WHERE badge_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $badge_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        #echo // javascript alert box here
        return false;
    }
}


// Award Badge Function
function award_badge($badge_id, $student_id, $conn) {
    $sql = "SELECT * FROM Collected_Badges WHERE badge_id = ? AND student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $badge_id, $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { // this student got the badge ady
        # echo // javascript alert box here
        return false;
    }

    $sql = "INSERT INTO Collected_Badges (badge_id, student_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $badge_id, $student_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Display all badge created by admin (gpt)
function creator_display_badges($creator_id, $conn) {
    $creator_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM Badges WHERE creator_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $creator_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='badge'>";
            echo "<img src='data:" . htmlspecialchars($row['image_type']) . ";base64," . base64_encode($row['badge_image']) . "' alt='Badge Image' />";
            # html can write achievement name and category
            echo "</div>";
        }
    } else {
        echo "<p>No badges found for this creator.</p>";
    }
}


// Display student obtain badges
function student_obtained_badges($student_id, $conn) {
    $sql = "SELECT b.* FROM Badges b INNER JOIN Collected_Badges cb ON b.badge_id = cb.badge_id WHERE cb.student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='badge'>";
            echo "<img src='data:" . htmlspecialchars($row['image_type']) . ";base64," . base64_encode($row['badge_image']) . "' alt='Badge Image' />";
            # put achievement text, category here
            echo "</div>";
        }
    } else {
        echo "<p>You havnt receive any badges yet. Keep it up !</p>";
    }
}


// Start Quiz Attempt Function
function start_quiz_attempt($quiz_id, $conn) {
    $student_id = $_SESSION['user_id'];
    $stat = 'in_progress';

    $sql = "INSERT INTO Attempt (student_id, quiz_id, stat) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $student_id, $quiz_id, $stat);
    if ($stmt->execute()) {
        $_SESSION['attempt_id'] = $conn->insert_id; // attempting the quiz now
        # echo timer function here (js)
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Finish Quiz Attempt Function
function finish_quiz_attempt($attempt_id, $time_remaining, $conn) {
    $stat = 'completed';
    $feedback = '-';

    $sql = "UPDATE Attempt SET stat = ? WHERE attempt_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $stat, $attempt_id);
    if ($stmt->execute()) { // change attempt table first
        $sql = "INSERT INTO Result (attempt_id, time_remaining, feedback) VALUES (?, ? , ? )";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $attempt_id, $time_remaining, $feedback);
        if ($stmt->execute()) { // then change result table
            // unset($_SESSION['attempt_id']);
            return true;
        } else {
            # echo // javascript alert box here
            return false;
        }
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// View all available quiz function
function view_available_quiz($conn) { //copied code to quiz.php, no need appear here anymore
    $sql = "SELECT * FROM Quiz";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            # echo html code here
        }
    } else {
        echo "No quiz available at the moment.";
    }
}


// User Profile Function
function user_profile($conn, $data) {
    $user_id=$_SESSION['user_id'];
    $sql = "SELECT $data FROM Users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info = htmlspecialchars($row[$data]);
        return $info;
    } else {
        echo "<script>console.log('Error.')</script>";
        return false;
    }
}



// Calculate Used Time Function
function calculate_used_time($attempt_id, $conn) {
    $sql = "SELECT q.time_limit, r.time_remaining FROM Result r INNER JOIN Attempt a ON r.attempt_id = a.attempt_id INNER JOIN Quiz q ON a.quiz_id = q.quiz_id WHERE r.attempt_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $attempt_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $used_time = $row['time_limit']*60 - $row['time_remaining'];
        return $used_time/60;
    } else {
        # echo // javascript alert box here
    }
}


// Student total collected badges
function calculate_total_badges_collected($student_id, $conn) {
    $sql = "SELECT COUNT(*) AS total FROM Collected_Badges WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = htmlspecialchars($row['total']);
    } else {
        $total = 0;
    }
    return $total;
}


// Submit Answer Function
function submit_answer($answers, $conn) { // add liao attempt id in table
    $attempt_id = $_SESSION['attempt_id'];
    foreach ($answers as $choice_id) {
        $attempt_id = htmlspecialchars($attempt_id);
        $choice_id = htmlspecialchars($choice_id);

        $sql = "INSERT INTO Student_Answer (attempt_id, choice_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $attempt_id, $choice_id);
        if (!$stmt->execute()) {
            # echo // javascript alert box here
            return false;
        }
    }

    # echo // javascript alert box here (answer submitted liao)
    return true;
}


// feedback function
function write_feedback($result_id, $feedback, $conn) {
    $feedback = htmlspecialchars($feedback);

    $sql = "UPDATE Result SET feedback = ? WHERE result_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $feedback, $result_id);
    if ($stmt->execute()) {
        # echo // javascript alert box here
        return true;
    } else {
        # echo // javascript alert box here
        return false;
    }
}


// Calculate score function (add liao attempt id in table)
function calculate_score($attempt_id, $conn){
    $sql = "SELECT c.question_id, c.is_correct FROM Student_Answer sa INNER JOIN Choices c ON sa.choice_id = c.choice_id WHERE sa.attempt_id = ?"; // can use sum if want
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $attempt_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $score = 0;
    while ($row = $result->fetch_assoc()) {
        if ($row['is_correct']) {
            $score++;
        }
    }

    return $score;

}


// Calculate Total Quiz Done by the Student Function
function total_quiz_done($student_id, $conn, $subject="") {
    if ($subject!=""){
        $sql = "SELECT COUNT(DISTINCT a.quiz_id) AS total FROM Attempt a INNER JOIN Quiz q ON a.quiz_id = q.quiz_id WHERE a.student_id = ? AND a.stat = 'completed' AND q.subject = '$subject'";

    }else{
        $sql = "SELECT COUNT(DISTINCT quiz_id) AS total FROM Attempt WHERE student_id = ? AND stat = 'completed'";

    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


// Grade Function
function calculate_grade($score, $total_questions) {
    $percentage = ($score / $total_questions) * 100;
    if ($percentage > 80) {
        return 'A';
    } elseif ($percentage > 70) {
        return 'B';
    } elseif ($percentage > 60) {
        return 'C';
    } elseif ($percentage > 50) {
        return 'D';
    } elseif ($percentage > 40) {
        return 'E';
    } else {
        return 'F';
    }
}


// Total Question Function
function total_question($quiz_id, $conn){
    $sql = "SELECT COUNT(*) AS totalq FROM Question WHERE quiz_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $quiz_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['totalq'];
    } else {
        return 0;
    }
}


// Quiz result function
function quiz_result($attempt_id, $conn){ //not working
    $sql = "SELECT q.subject, q.title, a.attempt_id, q.quiz_id, r.time_remaining, r.date, r.feedback FROM Attempt a INNER JOIN Quiz q ON a.quiz_id = q.quiz_id INNER JOIN Result r ON r.attempt_id = a.attempt_id WHERE a.attempt_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $attempt_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $subject = htmlspecialchars($row['subject']);
        $title = htmlspecialchars($row['title']);
        $question_answered = total_question($row['quiz_id'], $conn);
        $total_score = calculate_score($attempt_id, $conn);
        $completed_in = calculate_used_time($attempt_id, $conn) . "s";
        $date = htmlspecialchars($row['date']);
        $grade = calculate_grade($total_score, $question_answered);
        $feedback = htmlspecialchars($row['feedback']);

        // html or return here

    } else {
        # echo // javascript alert box here ;
    }
}


// Get Student Recent Activity Function
function get_student_recent_activity($conn) { //not using
    $student_id = $_SESSION['user_id'];
    $sql = "SELECT q.subject, q.title, q.description, r.date, r.feedback, a.attempt_id FROM Attempt a INNER JOIN Quiz q ON a.quiz_id = q.quiz_id INNER JOIN Result r ON r.attempt_id = a.attempt_id WHERE a.student_id = ? AND a.stat = 'completed' ORDER BY r.date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subject = htmlspecialchars($row['subject']);
            $title_description = htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['description']);
            $score = calculate_score($row['attempt_id'], $conn);
            $total_questions = total_questions($row['attempt_id'], $conn);
            $quiz_summary = ($score / $total_questions) * 100 . "%";
            $grade = calculate_grade($score, $total_questions);
            $used_time = calculate_used_time($row['attempt_id'], $conn) . "s";
            $date = htmlspecialchars($row['date']);
            $fedback = htmlspecialchars($row['feedback']);

        }
    } else {
        echo "No recent activity found. Find a quiz to do now :)";
    }
}


// Calculate Total Student Function
function total_student($conn) {
    $sql = "SELECT COUNT(*) AS total FROM Users WHERE role_id = 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


// Calculate Total Instructor Function
function total_instructor($conn) {
    $sql = "SELECT COUNT(*) AS total FROM Users WHERE role_id = 2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


// Calculate Total Quiz Created by an Instructor Function
function calculate_total_quiz_created($conn) {
    $creator_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(*) AS total FROM Quiz WHERE creator_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $creator_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


// Get Overall Report Function
function overall_report($conn) {
    $student_id = $_SESSION['user_id'];

    $total_score_percent = 0;
    $total_attempts = 0;
    $total_quiz_completed = total_quiz_done($student_id, $conn);

    //get each attempt score
    $sql = "SELECT a.attempt_id, SUM(c.is_correct) AS score, COUNT(q.question_id) AS total_ques FROM Attempt a
        INNER JOIN Question q ON q.quiz_id = a.quiz_id
        INNER JOIN Student_Answer sa ON sa.attempt_id = a.attempt_id
        INNER JOIN Choices c ON sa.choice_id = c.choice_id
        WHERE a.student_id = ? AND a.stat = 'completed'
        GROUP BY a.attempt_id";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $score = $row['score'];
            $total_questions = $row['total_ques'];
            $percent = ($score / $total_questions) * 100;
            $total_score_percent += $percent;
            $total_attempts++;
        }
    }

    $average_score = round($total_score_percent / $total_attempts, 2);
    if ($average_score > 80) {
        $average_grade = 'A';
    } elseif ($average_score > 70) {
        $average_grade = 'B';
    } elseif ($average_score > 60) {
        $average_grade = 'C';
    } elseif ($average_score > 50) {
        $average_grade = 'D';
    } elseif ($average_score > 40) {
        $average_grade = 'E';
    } else {
        $average_grade = 'F';
    }

    return array($average_score, $average_grade, $total_quiz_completed); //cannot return multiple value 1
}


// total quiz attempt by student craeted by 1 specific instructor function
function total_quiz_attempt($conn){
    $creator_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(*) AS total FROM Attempt a INNER JOIN Quiz q ON a.quiz_id = q.quiz_id WHERE q.creator_id = ?";
    $stmt = $conn-> prepare(sql);
    $stmt->bind_param("i", $creator_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


//Display all quiz attempt function
function display_attempt($conn){
    $sql = "SELECT a.attempt_id, a.student_id, u.name, q.title, q.description, r.time_remaining, r.feedback
        FROM Attempt a
        INNER JOIN Users u ON a.student_id = u.user_id
        INNER JOIN Quiz q ON a.quiz_id = q.quiz_id
        INNER JOIN Result r ON a.attempt_id = r.attempt_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_id = htmlspecialchars($row['student_id']);
            $student_name = htmlspecialchars($row['name']);
            $title = htmlspecialchars($row['title']) . " - " . htmlspecialchars($row['description']);
            $time_spent = calculate_used_time($row['attempt_id'], $conn) . "s";
            $feedback = htmlspecialchars($row['feedback']);
            // return $student_id, $student_name, $title, $time_spent, $feedback; canot return many value
        }
    }else{
        echo "No quiz attempts found. Your quiz havnt got student attempts yet :(";
    }
}


// display all student info
function admin_students_info($conn) {
    $sql = "SELECT user_id, name FROM Users WHERE role_id = 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_id = $row['user_id'];
            $student_name = $row['name'];
            $badges_collected = calculate_total_badges_collected($student_id, $conn);
            $quiz_completed = total_quiz_done($student_id, $conn);

            // return $student_id, $student_name, $badges_collected, $quiz_completed; cant return many value

        }
    } else {
        echo "No student found.";
    }
}


function admin_instructors_info($conn) {
    $sql = "SELECT user_id, name FROM Users WHERE role_id = 2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $instructor_id = $row['user_id'];
            $instructor_name = $row['name'];

            $sql_quiz_count = "SELECT COUNT(*) AS total FROM Quiz WHERE creator_id = ?";
            $stmt = $conn->prepare($sql_quiz_count);
            $stmt->bind_param("i", $instructor_id);
            $stmt->execute();
            $result_quiz_count = $stmt->get_result();
            $total_quiz_create = 0;
            if ($result_quiz_count->num_rows > 0) {
                $row_quiz_count = $result_quiz_count->fetch_assoc();
                $total_quiz_create = $row_quiz_count['total'];
            }
        }
    } else {
        echo "No instructors found.";
    }
}

//Timer function made with javascript
// not sure want quiz summary report for a specific quiz anot. (average score, etc, total attempts) instructor n admin de

?>
