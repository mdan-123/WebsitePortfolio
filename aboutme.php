<?php
    session_start();
    include_once('connection.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About me</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/aboutme.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Linden+Hill:ital@0;1&display=swap" rel="stylesheet">
    
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
                            <li><a href="http://localhost:8888/mdanish-phase2/experience.php">Experience</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/education.php">Education</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/skills.php">Skills</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/project.php"> Project</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/blog.php"> Blog</a></li>
                            <?php 
                            if(!empty($_SESSION)) {
                                $sql_admin = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                                $result_admin = mysqli_query($conn, $sql_admin);
                                if(mysqli_num_rows($result_admin)>0)
                                {
                                    ?>
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/addblog.php">Add post</a></li>
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a></li>
                                    <?php
                                } else {
                                    ?>
                                    
                                    <li><a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a></li>
                                    <?php
                                }
                                ?>
                                <?php
                            } else {
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

        <aside>
            <h2>About me</h2> 
            <p class="under"> ___________________</p>

        </aside>
                   
        <main>
            <section class="content-container">

                <div class="content-image">
                    <figure>
                        <img src="http://localhost:8888/mdanish-phase2/images/me.jpg" alt="Me">

                        <figcaption>Aspiring computer scientist</figcaption>
                    </figure>
                </div>


                <div class="content-description">





                    <p class="content-item">My name is Muhammad Danish Waheed and I am an undergraduate first year student at Queen Mary University of London, studying computer science.</p>


                    <p class="content-item">My aim is to become a software engineer. In order to do this I plan to complete my degree in Computer Science and take part in as many internships to help me gain the relevan experience.</p>
                </div>

               
            </section>
        </main>


        <footer>
            <div>
                <div class="blackbox">
                    <h1>Contact information:</h1>

                    <div>
                        <h3>Email:</h3>
                        <p>danishwaheed732@outlook.com</p>

                        <h3>Phone:</h3>
                        <p>07986711690</p>

                        
                    </div>
                </div>
            </div>


        </footer>



    </div>
</body>
</html>