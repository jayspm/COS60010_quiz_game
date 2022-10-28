<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Level Completed</title>  
  <link rel="stylesheet" href="styles/gameplay.css">
</head>
<body>
    <?php 
        session_start();
        echo "<h1>Congratulations! You have completed all levels!</h1>";
        $userId = $_SESSION['userId'];
        require_once('settings.php');	
        $connection = @mysqli_connect($host,$user,$pwd,$sql_db);
        $overall_score = 0;
        if($connection){
            $query = "SELECT * FROM students WHERE student_id='$userId'";

            $result = mysqli_query($connection,$query);

            while ($record = mysqli_fetch_assoc ($result) ){
              $overall_score = ($record["lv1_score"] + $record["lv2_score"] + $record["lv3_score"] + $record["lv4_score"] + $record["lv5_score"])/5;
            }
          
          echo "Your overall score is:". $overall_score;

          $updateQuery = "UPDATE students SET total_score=$overall_score WHERE student_id=$userId;";

          $result = mysqli_query($connection, $updateQuery);

        }
    ?>
    <form  method="post">
        <input type="submit" name="PlayAgain" value="Play Again" >
        <input type="submit" name="Home" value="Home">
    </form>
    <?php 
      if (isset($_POST['PlayAgain'])) {
        $_SESSION["level"] = 1;
        header("location:gameplay.php");
      }
      if(isset($_POST['Home'])){
        header("location:userprofile.php");
      }
    ?>
</body>
</html>