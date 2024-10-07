<?php
    session_start();
    include_once('connection.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <div>
                <nav class="containerheader">
                    <div class="header-item-name">
                        <h2 class="big">Muhammad Danish Waheed</h1>
                    </div>

                    <div class="header-ul-item">
                        <ul class="nav-list">
                            <li> <a href="http://localhost:8888/mdanish-phase2/aboutme.php"> About me</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/experience.php"> Experience</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/education.php"> Education</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/skills.php"> Skills</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/project.php"> Project</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/blog.php"> Blog</a></li>
                            <?php
                            if(empty($_SESSION))
                            {
                                ?><li><a href="http://localhost:8888/mdanish-phase2/php/register.php">Register</a></li>
                                <?php
                            }
                            elseif(!empty($_SESSION))
                            {
                                $sql_admin = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                                $result_admin = mysqli_query($conn, $sql_admin);
                                if(mysqli_num_rows($result_admin)>0)
                                {
                                    ?>
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/addblog.php">Add post</a></li>
                                    <?php
                                }
                            }
                            ?>
       
                        </ul>
                    </div>
                </nav>
            </div>
        </header> 
    


        <main class="title">

            <div>
                <div>
                    <h1>
                        Welcome to my portfolio
                    </h1>
                </div>

            </div>



        </main>



        <aside class="login">

            <div class="blackbox">
                <h2>
                    <?php
                        if(!empty($_SESSION)){
                            ?> <a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a>
                        
                        <?php

                    } else {
                        ?>
                        <a href="http://localhost:8888/mdanish-phase2/php/login.php"> Login</a>
                    <?php
                    }
                    ?>
                </h2>
            </div>

        </aside>


        <footer class="images">
            <div class="imgcontainer">
                <figure class="con">
                    <a href="https://github.com/mdan-123">
                        <img src="http://localhost:8888/mdanish-phase2/images/github.png" alt="github">
                    </a>
                    <a href="https://www.linkedin.com/in/danish-waheed-a198b7234">
                        <img src="http://localhost:8888/mdanish-phase2/images/linkedin.png" alt="linkedin">
                    </a>
                    <a href="mailto:danishwaheed732@outlook.com">
                        <img src="http://localhost:8888/mdanish-phase2/images/mail.png" alt="outlook">
                    </a>
                </figure>
            </div>
        </footer>
    
    </div>

</body>
</html>