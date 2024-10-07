<?php
    session_start();
    include_once('connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/experience.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arbutus+Slab&family=Cabin:ital,wght@0,400..700;1,400..700&family=Linden+Hill:ital@0;1&family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <div>
                <nav class="containerheader">
                    <div class="header-item-name">
                        <h1> Muhammad Danish Waheed</h1>
                    </div>
                    <div class="header-ul-item">
                        <ul class="nav-list">
                            <li> <a href="http://localhost:8888/mdanish-phase2/homepage.php"> Homepage</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/education.php">Education</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/aboutme.php">About me</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/skills.php">Skills</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/project.php"> Project</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/blog.php"> Blog</a></li>
                            <?php 
                            if(!empty($_SESSION)) 
                            {
                                $sql_admin = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                                $result_admin = mysqli_query($conn, $sql_admin);
                                if(mysqli_num_rows($result_admin)>0)
                                {
                                    ?>
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/addblog.php">Add post</a></li>
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a></li>
                                    <?php
                                } 
                                else 
                                {
                                    ?>
                                    
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a></li>
                                    <?php
                                }
                                ?>
                                <?php
                            } 
                            else 
                            {
                                ?>
                                <li><a href="http://localhost:8888/mdanish-phase2/php/login.php">Login</a></li>
                                <li><a href="http://localhost:8888/mdanish-phase2/php/register.php">Register</a></li>

                                <?php
                            }
                             
                            ?>

                            
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <div>
                <h2>Experience</h2> 
                <p class="under"> ________________________________</p>


                <div class="box">
                    <h3>Top Mark Tuition Centre</h3>
                    <p>Working as a tutor for GCSE and primary kids.</p>
                    <p>Currently employed</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>