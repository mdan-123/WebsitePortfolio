
<?php
    include_once("connection.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/register.css">
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
                            <li><a href="http://localhost:8888/mdanish-phase2/experience.php"> Experience</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/php/logout.php">Logout</a></li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

    
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
            <fieldset>
                <legend>Register</legend>


                <div>
                    
                    <input type="email" name="email" id="email"  placeholder="Email you want to register with" required> <br>
                    
                    <br>
                
                    <br>

                    <input type="password" name="password" id="password"  placeholder="Enter your password here please" required><br>
                </div>



                <div class="buttons">
                    <input type="submit" value="Register" class="big-button" id="submit" name="submit" >

                    <input type="reset" value="Clear blog" class="big-button" id="clear">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php

    if(!empty($_SESSION))
    {
        header("Location: http://localhost:8888/mdanish-phase2/blog.php");
    }
    else
    {

        if(isset($_POST["submit"]))
        {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            $sql = "INSERT INTO USERS (email, password) VALUES ('$email', '$password')";
            mysqli_query($conn, $sql);

            header("Location: http://localhost:8888/mdanish-phase2/blog.php");
        }
    }

?>