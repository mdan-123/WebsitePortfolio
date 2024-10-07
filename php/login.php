
<?php

    session_start();
    include("connection.php");
    $error = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arbutus+Slab&family=C
    abin:ital,wght@0,400..700;1,400..700&family=Linden+Hill:ital@0;1&family=No
    to+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <header>
            <div>
                <nav class="containerheader">
                    <div class="header-item-name">
                        <h2>Muhammad Danish Waheed</h1>
                    </div>

                    <div class="header-ul-item">
                        <ul class="nav-list">
                            <li> <a href="http://localhost:8888/mdanish-phase2/homepage.php"> Homepage</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/aboutme.php"> About me</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/experience.php"> Experience</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/education.php"> Education</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/skills.php"> Skills</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/project.php"> Project</a></li>
                            <li> <a href="http://localhost:8888/mdanish-phase2/blog.php"> Blog</a></li>
                            <li><a href="http://localhost:8888/mdanish-phase2/php/register.php">Register</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend><h1>Login</h1></legend>

                <?php if(isset($error) && !empty($error) ) : ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                


                <label for="email"> Email:</label> <br>
                <input type="email" name="email" id="email" required><br>

                <label for="password"> Password:</label> <br>
                <input type="password" name="password" id="password" required><br>



                <div class="buttons">
                    <input type="submit" value="Login" name = "Login" class="big-button"> 

                    <input type="reset" value="Reset" class="big-button"> 
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>




<?php

    if(isset($_SESSION["email"]) && isset($_SESSION["password"])){
        header("Location: homepage.html");
    }

    if(isset($_POST["Login"])){

        $email = $_POST["email"];
        $password = $_POST["password"];
        $error = "";

        $sql_admin_email = "SELECT * FROM ADMIN WHERE email = '$email'";
        $admin_email_result = mysqli_query($conn, $sql_admin_email);

        if(mysqli_num_rows($admin_email_result) > 0){

            $sql_admin_password = "SELECT * FROM ADMIN WHERE password = '$password' AND email = '$email'";

            $admin_password_result = mysqli_query($conn, $sql_admin_password);

            if(mysqli_num_rows($admin_password_result) > 0){
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("Location: http://localhost:8888/mdanish-phase2/php/addblog.php");
            }
            else{
                $error = "The password is incorrect. Please try again.";
                ?> <div class="error"> <?php echo $error ?></div>
                <?php
            }

            

        }

        else{

            $sql_user_email = "SELECT * FROM USERS WHERE email = '$email'";
            $user_email_result = mysqli_query($conn, $sql_user_email);
            if(mysqli_num_rows($user_email_result) > 0){

                $sql_user_password = "SELECT * FROM USERS WHERE password = '$password' AND email = '$email'";

                $user_password_result = mysqli_query($conn, $sql_user_password);

                if(mysqli_num_rows($user_password_result) > 0){
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                    header("Location: http://localhost:8888/mdanish-phase2/blog.php");
                }
                else{
                    $error = "The password is incorrect. Please try again.";

                    ?> <div class="error"> <?php echo $error ?></div>
                    <?php
                }

                

            }

            else{
                $error = "The email is incorrect. Please try again.";
                ?> <div class="error"> <?php echo $error ?></div>
                <?php
            }
        }
        

  




    }

?>