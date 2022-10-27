<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mathematics Quiz Games" />
    <meta name="keywords" content="Math, Quiz, Game, Drag and Drop Game" />
    <meta name="author" content="G13 - 2022-HS2-COS60010-Technology Enquiry Project" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/pagestyle.css" />
    <title>Maths Practice Online</title>
</head>
<body>
<main>
    <h1>Profile</h1><!--style this-->

<div class="grid">

    <!--Read only view of username, level and score-->
    <!--Username box-->
    <?php
         session_start();
         require_once('settings.php');	
         $connection = @mysqli_connect($host,$user,$pwd,$sql_db);

         $userId = $_SESSION["userId"];
         if($connection){
            $query = "SELECT * FROM students WHERE student_id='$userId'";
            $result = mysqli_query($connection, $query);

            while ($record = mysqli_fetch_assoc ($result) ){
                echo "<div class='profileBox1'>
                <label for='userName'>Full Name</label>
                <br>
                <span id='userName'>{$record['name']}</span>
                </div>

                <div class='profileBox2'>
                <label for='level'>Level</label>
                <br>
                <span id='level'>{$record['current_level']}</span>
                </div>
                <!--Score box-->
                <div class='profileBox3'>
                <label for='score'>Score</label>
                <br>
                <span id='score'>{$record['total_score']}</span>
                </div>";
            }
         }
    ?>
    

    <!-- Return to home -->
    <div class="profileBox4">
    <a href="logout.php">Logout</a>
    </div>
</div>

<!--form-->
<!--hidden info for back end-->
<form method="post" action="userprofile.php" class="userinfo">
    <div class="submitgrid">
        <div class="nextbtn">
            <button name="Play" type="submit" id="userprofbtn">Play</button>
        </div>
    </div>
</form>


<?php
    if(isset($_POST["Play"])){
        header("Location:gameplay.php");
    }
?>

<script src="scripts/script.js"></script>
  





    <footer>
        <hr>
        <p id="footer-center">
            &copy; <a href="https://www.swinburne.edu.au/">Swinburne University of Technology</a>.&nbsp;&nbsp;&nbsp;&nbsp;By: G13 - 2022-HS2-COS60010-Technology Enquiry Project
        </p>
    </footer>
</main>
</body>
</html>
