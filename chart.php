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
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-cartesian.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-core.min.js"></script>
    <title>Maths Practice Online</title>

        <script>
        
            anychart.onDocumentLoad(function () {
                var chart = anychart.pie();

                <?php

                    require_once("settings.php");

                    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                    if (!$conn) {
                        echo "Connection failure!!!";
                    } else {
                        $tablename = "students";
                        $query_select = "SELECT grade, count(*) as Total_student FROM students GROUP BY grade;";
                        $result = mysqli_query($conn, $query_select);

                        echo "chart.data([";
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "['Grade " , $row["grade"],"', " , $row["Total_student"] , "],";
                            
                        }   
                        echo "]);";

                        mysqli_free_result($result);

                        $query_line = "SELECT grade, ROUND(AVG(current_level) ,0) AS avglv FROM students GROUP BY grade;";
                        $result_line = mysqli_query($conn, $query_line);

                        echo "\nvar linedata = [";
                        while ($row = mysqli_fetch_assoc($result_line)){
                            echo "['Grade " , $row["grade"] ,"', " , $row["avglv"] , "],";
                            
                        }   
                        echo "];";

                        mysqli_free_result($result_line);

                        $query_range = "SELECT grade, MIN(current_level) AS lvmin, MAX(current_level) AS lvmax FROM students GROUP BY grade;";
                        $result_range = mysqli_query($conn, $query_range);

                        echo "\nvar rangedata = [";
                        while ($row = mysqli_fetch_assoc($result_range)){
                            echo "['Grade " , $row["grade"] ,"', " , $row["lvmin"] , ", " , $row["lvmax"] , "],";
                            
                        }   
                        echo "];";

                        mysqli_free_result($result_range);
                    }

                    mysqli_close($conn);
                ?>

                chart.container("noofstudent");
                chart.draw();

                var linechart = anychart.line();
                var lineseries = linechart.line(linedata);
                linechart.container("avelevel");
                linechart.draw();

                rangechart = anychart.column();
                var rangeseries = rangechart.rangeColumn(rangedata);
                rangechart.container("highestandlowestlv");
                rangechart.draw();

            });

        </script>
    
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
                    <div class="img-case">
                        <img src="images/icon_user.png" />
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-2">
                <div class="chart-dashboard">
                    <div class="title">
                        <h2>Number of students for each grade</h2>
                    </div>
                    <div id="noofstudent" style="width: 600px; height: 500px;"></div>
                    <br />
                    <br />
                    <br />
                    <hr />
                    <div class="title">
                        <h2>Average current level for each grade</h2>
                    </div>
                    <div id="avelevel" style="width: 600px; height: 500px;"></div>
                    <br />
                    <br />
                    <br />
                    <hr />
                    <div class="title">
                        <h2>Highest and lowest level for each grade</h2>
                    </div>
                    <div id="highestandlowestlv" style="width: 600px; height: 500px;"></div>
                    </div>
                </div>
            </div>
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