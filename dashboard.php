<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mathematics Quiz Games" />
    <meta name="keywords" content="Math, Quiz, Game, Drag and Drop Game" />
    <meta name="author" content="G13 - 2022-HS2-COS60010-Technology Enquiry Project" />
    <link rel="stylesheet" href="styles/dashboard.css" />
    <link rel="stylesheet" href="styles/pagestyle.css" />
    <!--<script src="scripts/script.js"></script>-->
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js" type="text/javascript"></script>
    <title>Maths Practice Online</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Dashboard</h1>
        </div>
        <!--this is the test-->
        <ul>
            <li><a href="dashboard.php?grade=all"><img src="images/icon_students.png" />&nbsp; Students</a></li>
            <li><a href="dashboard.php?grade=grade1"><img src="images/icon_students.png" />&nbsp; Grade 1</a></li>
            <li><a href="dashboard.php?grade=grade2"><img src="images/icon_students.png" />&nbsp; Grade 2</a></li>
            <li><a href="dashboard.php?grade=grade3"><img src="images/icon_students.png" />&nbsp; Grade 3</a></li>
            <li><a href="dashboard.php?grade=grade4"><img src="images/icon_students.png" />&nbsp; Grade 4</a></li>
            <li><a href="dashboard.php?grade=grade5"><img src="images/icon_students.png" />&nbsp; Grade 5</a></li>
            <li><a href="dashboard.php?grade=grade6"><img src="images/icon_students.png" />&nbsp; Grade 6</a></li>
            <li><a href="chart.php"><img src="images/icon_overall.png" />&nbsp; Overall</a></li>
            <!--<li><a href=""><img src="images/icon_create.png" />&nbsp; Add New Quiz</li>-->
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..." />
                    <button type="submit"><img src="images/icon_search.png" /></button>
                </div>
                <div class="user">
                    <a href="logout.php" class="btn">Log out</a>
                    <img src="images/icon_notification.png" />
                    <!-- <a href="userprofile.php" class="img-case">
                        <img src="images/icon_user.png" />
                    </a> -->
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-2">
                <div class="student-dashboard">
                    <div class="title">
                        <h2>Student details</h2>
                    </div>
                    
                    <?php
                        require_once("settings.php");

                        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                        if (!$conn) {
                            echo "Connection failure!!!";
                        } else {
                            $tablename = "students";
                            $query_select = "SELECT * FROM $tablename;";

                            if(isset($_GET["grade"])) {
                                $studentGrade = $_GET["grade"];
                                
                                switch ($studentGrade) {
                                    case "grade1": $query_select = "SELECT * FROM $tablename WHERE grade = 1;";
                                        break;
                                    case "grade2": $query_select = "SELECT * FROM $tablename WHERE grade = 2;";
                                        break;
                                    case "grade3": $query_select = "SELECT * FROM $tablename WHERE grade = 3;";
                                        break;
                                    case "grade4": $query_select = "SELECT * FROM $tablename WHERE grade = 4;";
                                        break;
                                    case "grade5": $query_select = "SELECT * FROM $tablename WHERE grade = 5;";
                                        break;
                                    case "grade6": $query_select = "SELECT * FROM $tablename WHERE grade = 6;";
                                        break;
                                    default: $query_select = "SELECT * FROM $tablename;";
                                }
                            }

                            //$query_select = "SELECT * FROM $tablename;";
                            $result = mysqli_query($conn, $query_select);

                            echo "<p class='txt_note'>* The value displayed in each level column is the percentage of student attending the quiz before passing the level.&nbsp</p>";

                            echo "<table>";
                            echo "<tr>
                                    <th class='txt_center'>Student ID</th>
                                    <th class='txt_center'>Name</th>
                                    <th class='txt_center'>Grade</th>
                                    <th class='txt_center'>Current Level</th>
                                    <th class='txt_center'>Level 1</th>
                                    <th class='txt_center'>Level 2</th>
                                    <th class='txt_center'>Level 3</th>
                                    <th class='txt_center'>Level 4</th>
                                    <th class='txt_center'>Level 5</th>
                                    <th class='txt_center'>Total Scores</th>
                                </tr>";
                            
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td class='txt_center'>",$row["student_id"],"</td>";
                                echo "<td class='col_width'>",$row["name"],"</td>";  
                                echo "<td class='txt_center'>",$row["grade"],"</td>";
                                echo "<td class='txt_center'>",$row["current_level"],"</td>";
                                echo "<td class='txt_center'>",$row["lv1_score"],"</td>";
                                echo "<td class='txt_center'>",$row["lv2_score"],"</td>";
                                echo "<td class='txt_center'>",$row["lv3_score"],"</td>";
                                echo "<td class='txt_center'>",$row["lv4_score"],"</td>";
                                echo "<td class='txt_center'>",$row["lv5_score"],"</td>";
                                echo "<td class='txt_center'>",$row["total_score"],"</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            mysqli_free_result($result);
		                }

		                mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
   <!-- <div id="container" style="width: 500px; height: 400px;"></div>-->
   
    <footer>
        <hr>
        <p id="footer-center">
            &copy; <a href="https://www.swinburne.edu.au/">Swinburne University of Technology</a>.&nbsp;&nbsp;&nbsp;&nbsp;By: G13 - 2022-HS2-COS60010-Technology Enquiry Project
        </p>
    </footer>
    
</body>
</html>