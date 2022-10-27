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
    <title>Maths Practice Online</title>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Dashboard</h1>
        </div>
        <!--this is the test-->
        <ul>
            <li><img src="images/icon_students.png" />&nbsp; Students</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 1</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 2</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 3</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 4</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 5</li>
            <li><img src="images/icon_students.png" />&nbsp; Student Grade 6</li>
            <li><img src="images/icon_create.png" />&nbsp; Add New Quiz</li>
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
                    <a href="userprofile.php" class="img-case">
                        <img src="images/icon_user.png" />
                    </a>
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
                        require_once("database/settings.php");

                        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                        if (!$conn) {
                            echo "Connection failure!!!";
                        } else {
                            $tablename = "students";
                            $query_select = "SELECT * FROM $tablename;";
                            $result = mysqli_query($conn, $query_select);

                            echo "<table>";
                            echo "<tr>
                                    <th>Student ID</th>
                                    <thName</th>
                                    <th>Level</th>
                                    <th>Scores</th>
                                </tr>";
                            
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>",$row["student_id"],"</td>";
                                echo "<td>",$row["student_name"],"</td>";  
                                echo "<td>",$row["student_level"],"</td>";
                                echo "<td>",$row["student_scores"],"</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }

                    ?>
                    
                    <table>
                        <tr>
                            <th>Student Id</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Scores</th>
                        </tr>
                        <tr>
                            <td>120</td>
                            <td>John Smith</td>
                            <td>3</td>
                            <td>28/30</td>
                        </tr>
                        <tr>
                            <td>131</td>
                            <td>Anna Jones</td>
                            <td>2</td>
                            <td>15/20</td>
                        </tr>
                    </table>
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