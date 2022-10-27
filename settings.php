<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104046040";
	$pwd = "051296";
	$sql_db = "s104046040_db";
?>

CREATE TABLE students (
    student_id INT PRIMARY KEY,
    student_name VARCHAR(75),
    student_level INT,
    student_scores INT,
    student_grade INT);