<?php
  session_start();
  if (!isset ($_SESSION["level"])) {
      $_SESSION["level"] = 1;
  }
  $level = $_SESSION["level"];

  if ($level == 1) {
    $eq1 = "11 - 3";
    $eq2 = "4 + 8";
    $eq3 = "11 + 5";
    $eq4 = "18 - 4";
    $eq5 = "21 - 12";

    $ans1 = "8";
    $ans2 = "12";
    $ans3 = "16";
    $ans4 = "14";
    $ans5 = "9";
  }
  if ($level == 2) {
    $eq1 = "72 / 9";
    $eq2 = "5 * 6";
    $eq3 = "121 / 11";
    $eq4 = "2 * 7";
    $eq5 = "54 / 6";

    $ans1 = "8";
    $ans2 = "30";
    $ans3 = "11";
    $ans4 = "14";
    $ans5 = "9";
  }

  if ($level == 3) {
    $eq1 = "(96 + 24) - 105";
    $eq2 = "16 + (2 * 6)";
    $eq3 = "(105 / 5) - 9";
    $eq4 = "154 / (33 - 19)";
    $eq5 = "(6 * 3)-( 10 / 5)";

    $ans1 = "15";
    $ans2 = "28";
    $ans3 = "12";
    $ans4 = "11";
    $ans5 = "16";
  }
  if ($level == 4) {
    $eq1 = "Solve for x. \n 2x − 6 = 14";
    $eq2 = "Solve for x. \n 5x + 10 = 20";
    $eq3 = "Solve for x. \n 10x − 6 = 4";
    $eq4 = "Solve for x. \n x − 2 = 4";
    $eq5 = "Solve for x. \n 6x − 6 = 12";

    $ans1 = "10";
    $ans2 = "2";
    $ans3 = "1";
    $ans4 = "6";
    $ans5 = "3";
  }
  // if ($level == 4) {
  //   $eq1 = "16 + 14 ÷ 2 + 3 * 5 − 11";
  //   $eq2 = "(11 − 5) * (63 − 59 + 6) ÷ 12";
  //   $eq3 = "(7 / 21) * (3 / 7)";
  //   $eq4 = "4 + 6";
  //   $eq5 = "8 + 9";

  //   $ans1 = "8";
  //   $ans2 = "12";
  //   $ans3 = "16";
  //   $ans4 = "7";
  //   $ans5 = "17";
  // }
  if ($level == 5) {
    $eq1 = "Captain buys a 100g bar of chocolate. \n He eats ⅗ of his bar. \n How many grams of chocolate are left?";
    $eq2 = "The side of a regular pentagon is 7cm. \n  What is the perimeter?";
    $eq3 = "In a jar , there are some candies. \n Jack takes half the candies. \n Jane takes a fourth of the candies. There are 3 candies left. \n How many candies were in the jar at the start?";
    $eq4 = "Jimmy is a mechanic who charges a $15 flat fee for every customer. \n He also charges his customers $10 for every 10 minutes that he spends with him. \n If Mrs. Collins had an appointment that lasted 30 minutes, \n how much did she have to pay Jimmy?";
    $eq5 = "Tim is ordering uniforms for the soccer team.\n There are 15 people on the team and 3 uniforms come in each box. \n How many boxes Tim should order?";

    $ans1 = "40";
    $ans2 = "35";
    $ans3 = "12";
    $ans4 = "45";
    $ans5 = "5";
  }
  if ($level > 5) {
    header("location:levelcompleted.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Level <?php echo $level ?></title>  
  <link rel="stylesheet" href="styles/gameplay.css">
</head>
<body>
<div class="hero">
<h1>Maths Game</h1>
<div class="gameinfo">
  <h2>Level <?php echo $level ?></h2>
  <p>Drag the equation over the correct answer</p>
</div> 

  <main class="container">
    <div>
      <ul class="draggable-list">
        <li id="e1" draggable="true"><?php echo $eq1 ?></li>
        <li id="e2" draggable="true"><?php echo $eq2 ?></li>
        <li id="e3" draggable="true"><?php echo $eq3 ?></li>
        <li id="e4" draggable="true"><?php echo $eq4 ?></li>
        <li id="e5" draggable="true"><?php echo $eq5 ?></li>
      </ul>
    </div>
    <div>
      <ul class="draggable-list">
        <li id="s1" draggable="true"><?php echo $ans1 ?></li>
        <li id="s2" draggable="true"><?php echo $ans2 ?></li>
        <li id="s3" draggable="true"><?php echo $ans3 ?></li>
        <li id="s4" draggable="true"><?php echo $ans4 ?></li>
        <li id="s5" draggable="true"><?php echo $ans5 ?></li>
      </ul>
    </div>
  </main>
  <div class="behind">
  <div id="endMessage">
    <h3>Well done!</h3>
    <table>
      <tr>
        <th>Question</th>
        <th>Answer</th>
      </tr>
      <tr>
        <td><?php echo $eq1 ?></td>
        <td><?php echo $ans1 ?></td>
      </tr>
      <tr>
        <td><?php echo $eq2 ?></td>
        <td><?php echo $ans2 ?></td>
      </tr>
      <tr>
        <td><?php echo $eq3 ?></td>
        <td><?php echo $ans3 ?></td>
      </tr>
      <tr>
        <td><?php echo $eq4 ?></td>
        <td><?php echo $ans4 ?></td>
      </tr>
      <tr>
        <td><?php echo $eq5 ?></td>
        <td><?php echo $ans5 ?></td>
      </tr>
    </table>

    <button onclick="playAgain()">Play Again</button>
    <p><a href="levelup.php">Next Level &#x2191;</a></p>
    <p><a href="leveldown.php">Go Back &#x2191;</a></p>
    <form  method="post">
        <input type="text" name="gameLevel" value="<?php echo $level ?>" >
        <input type="submit" name="nextLevel" value="Next Level">
    </form>
    <?php 
      if (isset($_POST['nextLevel'])) {
        $getLevel = $_POST['gameLevel']; 
        // $level =  $_SESSION["level"];
        // $level++;
        $_SESSION["level"]++;
        header("location:gameplay.php");
      }
    ?>

  </div>
</div>

  <script src="scripts/gameplay.js"></script>
</div>

  
</body>
</html>
