<?php
    session_start();
    session_destroy();
    header("Location: index.php");
?>

<!-- level, total score, name -->