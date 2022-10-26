<?php
    session_start();
    $level = $_SESSION["level"];
    $level++;
    $_SESSION["level"] = $level;
    header("location:gameplay.php");
?>