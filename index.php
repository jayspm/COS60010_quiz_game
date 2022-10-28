<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mathematics Quiz Games" />
    <meta name="keywords" content="Math, Quiz, Game, Drag and Drop Game" />
    <meta name="author" content="G13 - 2022-HS2-COS60010-Technology Enquiry Project" />
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/login.js"></script>
    <title>Maths Practice Online</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="loginBtn" class="toggle-btn">Log in</button>
                <button type="button" id="registerBtn" class="toggle-btn">Register</button>
            </div>
            <form id="login"  method="post" action="index.php" class="input-group">
                <input type="text" class="input-field" name="userId" placeholder="User Id" required />
                <input type="Password" class="input-field" name="password" placeholder="Enter Password" required />
                <p><br /></p>
                <button type="submit" name="Login" class="submit-btn">Log in</button>
            </form>
            <?php
                session_start();
                if(isset($_POST["Login"])){
                    $userId = $_POST["userId"];
                    $password = $_POST["password"];

                    require_once('settings.php');	
                    $connection = @mysqli_connect($host,$user,$pwd,$sql_db);

                    if($connection){
                        $query = "SELECT * FROM `users` WHERE userId='$userId' and password='$password'";


                        $result = mysqli_query($connection,$query) or die(mysql_error());
                        $rows = mysqli_num_rows($result);
                        if($rows==1){
                            while ($record = mysqli_fetch_assoc ($result) ){
                                $_SESSION['userId'] = $record['userId'];
                                $_SESSION['role'] = $record['role'];
                                $userId = $record['userId'];

                                if($record['role'] == 'student'){
                                    $query = "SELECT * FROM students WHERE student_id='$userId'";

                                    $resultnew = mysqli_query($connection,$query);
                                    while ($record = mysqli_fetch_assoc ($resultnew) ){
                                        $_SESSION["level"] = $record["level"];
                                    }
                                }

                                if($record['role'] == "student"){
                                    header("Location:userprofile.php");
                                } else {
                                    header("Location:dashboard.php");
                                }
                            }
                        } else {
                            echo "<p>Username/password is incorrect.<p>";
                        }
                    }
                }
            ?>
            <form id="register"  method="post" action="index.php" class="input-group">
                <input type="text" class="input-field" name="userId" placeholder="User Id" required /> 
                <!--<input type="text" class="input-field" placeholder="Role" required /> to check box-->
                <input type="password" class="input-field" name="password" placeholder="Enter Password" required />

                <p><br /></p>
                <input type="radio" name="role" id="student" value="student" checked>
                <label for="student" class="testText">Student</label>
                
                <input type="radio" name="role" id="teacher" value="teacher">
                <label for="teacher" class="testText">Teacher</label>
                <p><br /></p>
                <button type="submit" name="Register" class="submit-btn">Register</button>
            </form>
            <?php
                if(isset($_POST["Register"])){
                    $userId = $_POST["userId"];
                    $password = $_POST["password"];
                    $role = $_POST["role"];

                    require_once('settings.php');	
                    $connection = @mysqli_connect($host,$user,$pwd,$sql_db);

                    if($connection){
                        $create_table = "CREATE TABLE IF NOT EXISTS users (
                            userId VARCHAR(25) PRIMARY KEY,
                            password VARCHAR(25) NOT NULL,
                            role VARCHAR(25) NOT NULL
                            );";

                        $result = mysqli_query($connection, $create_table);

                        if($result){
                            if($role == 'student'){
                                $checkStudent = "SELECT * FROM students WHERE student_id='$userId'";
                                $studentResult = mysqli_query($connection, $checkStudent);

                                if (mysqli_num_rows($studentResult) == 0) {
                                    echo "Your ID doesn't exists in student database";
                                } else {
                                    $checkQuery = "SELECT * FROM users WHERE userId='$userId'";
                                    $checkresult =  mysqli_query($connection, $checkQuery);

                                    if (mysqli_num_rows($checkresult) > 0) {
                                        echo "Username already taken"; 	
                                    }else {
                                        $add_user = "INSERT INTO users (userId, password, role) VALUES ('$userId', '$password', '$role');"; 
                                        $execute = mysqli_query($connection, $add_user);

                                        if($execute){
                                            echo "<p>User created sucessfully.</p>";
                                        } else {
                                            echo "<p>Unable to create a user.</p>";
                                        }
                                    }
                                }
                            } else {
                                $checkQuerynew = "SELECT * FROM users WHERE userId='$userId'";
                                $checkresultnew =  mysqli_query($connection, $checkQuerynew);

                                if (mysqli_num_rows($checkresultnew) > 0) {
                                    echo "Username already taken"; 	
                                }else {
                                    $add_usernew = "INSERT INTO users (userId, password, role) VALUES ('$userId', '$password', '$role');"; 
                                    $executenew = mysqli_query($connection, $add_usernew);

                                    if($executenew){
                                        echo "<p>User created sucessfully.</p>";
                                    } else {
                                        echo "<p>Unable to create a user.</p>";
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>

    <footer>
        <hr>
        <p id="footer-center">
            &copy; <a href="https://www.swinburne.edu.au/">Swinburne University of Technology</a>.&nbsp;&nbsp;&nbsp;&nbsp;By: G13 - 2022-HS2-COS60010-Technology Enquiry Project
        </p>
    </footer>
</body>
</html>
