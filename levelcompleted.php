



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