<?php
    session_start();
    include_once('connection.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/extraforproject.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/project.css">
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
                            <li><a href="http://localhost:8888/mdanish-phase2/experience.php"> Experience</a></li>
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
                <h2>Project</h2> 
                <p class="under"> ________________________________</p>


                <div class="box">
                    <h3>Chess with AI and multiplayer</h3>
             
                    <section class="content-container">

                        <div class="content-image">
                            <figure>
                                <img src="http://localhost:8888/mdanish-phase2/images/chess.png" alt="chess">
        
                                <figcaption>Screenshot from a game</figcaption>
                            </figure>
                        </div>

                        <div class="content-description">
        
                            <p class="content-item">This is a chess game I made when I was in sixth form. In this chess game you are able to play online and against AI. In terms of AI, I had implemented
                                a minimax algorithm of two steps meaning that the AI can see all the possible moves for 2 steps ahead and uses a point system to see which move
                                would bring about the greatest amount of points. It will also print in the terminal all the moves the AI has looked at and the points corresponding to each move. So that the user can see
                                whether the AI has made a good move or not. In terms of online multiplayer, I had made a client to client connection using sockets. Meaning that the hosting client will act like a server for both as the opposing player will join that client.
                                In the terminal it will print whether each move has been successfully sent and received.
                            </p>


                            <p class="content-item"><a href="https://github.com/mdan-123/chess-online-and-Ai"> Link to github repository.</a></p>


                        </div>
        
                       
                    </section>
                </div>

            </div>
       

            <br>
            <br>
      
            <div class="box">
                <h3>Portfolio Website</h3>
         
                <section class="content-container">

                    <div class="content-image">
                        <figure>
                            <img src="http://localhost:8888/mdanish-phase2/images/portfolio.png" alt="chess">
    
                            <figcaption>screenshot from the index page</figcaption>
                        </figure>
                    </div>

                    <div class="content-description">
    
                        <p class="content-item">This is a portfolio wesbite i have created using HTML5 and CSS. What you are seeing right now is the index page. Each of the elements in the nav list are its own HTML page. </p>


                        <p class="content-item">As of right now the code has no functionality but will be added with time.</p>
                    </div>
    
                   
                </section>
            </div>
      

        </main>
        <footer>
            <div>
                <div class="blackbox">
                    <h1><a href="https://github.com/mdan-123">Link to github</a></h1>

         
                    </div>
                </div>
            </div>

        </footer>
    </div>
</body>
</html>