
<?php
    include_once("connection.php");
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add blog</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/addblog.css">
    <script src="http://localhost:8888/mdanish-phase2/js/addblog.js"></script>
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
                            <li><a href="http://localhost:8888/mdanish-phase2/blog.php">Blog</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

    
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
            <fieldset>
                <legend>Add Blog Post</legend>


                <div>
                    <!-- <label for="Title"> Title</label> <br> -->
                    <input type="text" name="title" id="title"  placeholder="Title" > <br>
                    
                    <br>
                
                    <br>


                    <!-- <label for="Description"> Enter your text here</label> <br> -->
                    <textarea name="description" id="description" cols="30" rows="10"  placeholder="Enter your text here"></textarea> <br>
                </div>



                <div class="buttons">
                    <input type="submit" value="Submit" class="big-button" id="submit" name="submit" >

                    <input type="reset" value="Clear blog" class="big-button" id="clear">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php

    if(isset($_POST["submit"]))
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $datetime = new DateTime('now', new DateTimeZone('Europe/London'));
        $string = $datetime->format('Y-m-d H:i:s');

        $sql = "INSERT INTO STORAGE (title, description, event_datetime) VALUES ('$title', '$description', '$string')";
        mysqli_query($conn, $sql);

        header("Location: http://localhost:8888/mdanish-phase2/blog.php");
    }

?>