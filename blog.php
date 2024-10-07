<?php
    
    session_start();
    include_once('connection.php');
    $sql = "SELECT * FROM STORAGE";
    $rows = array();
    $result = mysqli_query($conn, $sql);

    
    function format($raw)
    {
        $datetime = new DateTime($raw);
        $format = $datetime->format('jS F Y, H:i T');
        echo $format;
    }

    function bubbleSort(&$arr) {
        $size = count($arr);
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-1-$i; $j++) {
                if (compare($arr[$j], $arr[$j+1]) > 0) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }
    }


    function bubbleSortMonths(&$months) {
        $n = count($months);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strtotime($months[$j]['month']) > strtotime($months[$j + 1]['month'])) {
                    $temp = $months[$j];
                    $months[$j] = $months[$j + 1];
                    $months[$j + 1] = $temp;
                }
            }
        }
    }
    
    

    
    $sql_months = "SELECT DISTINCT DATE_FORMAT(event_datetime, '%M %Y') as month FROM STORAGE";
    $result_months = mysqli_query($conn, $sql_months);
    
    
    $months = array();
    while ($row = mysqli_fetch_array($result_months)) {
        $months[] = $row;
    }
    
    bubbleSortMonths($months);

    $selected_month = "all";



    $stack = array();
    foreach ($months as $month) {
        array_push($stack, $month);

    }

    $reversed = array();
    while (!empty($stack)) {
        array_push($reversed, array_pop($stack));
    }

    $months = $reversed;



    if(isset($_GET['month']) && $_GET['month'] !== "all")
    {
        $selected_month = $_GET['month'];
        $sql = "SELECT * FROM STORAGE WHERE DATE_FORMAT(event_datetime, '%M %Y') = '$selected_month'";
        $result = mysqli_query($conn, $sql);

    }
    elseif(isset($_GET['month']) && $_GET['month'] === "all"){
        $selected_month = "all";
        $sql = "SELECT * FROM STORAGE";
        $result = mysqli_query($conn, $sql);
    }

    function compare($a, $b)
    {
        if (isset($a['event_datetime'], $b['event_datetime'])) {
            return strtotime($a['event_datetime']) - strtotime($b['event_datetime']);
        }
    }

    if(mysqli_num_rows($result) == 0 && (!isset($_GET['month']))) {

        $checker = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
        $result_checker = mysqli_query($conn, $checker);
        if(mysqli_num_rows($result_checker)>0)
        {
            header("Location: http://localhost:8888/mdanish-phase2/php/addblog.php");
            exit();
        }
        elseif(empty($_SESSION))
        {
            header("Location: http://localhost:8888/mdanish-phase2/php/login.php");
            exit();
        }
        else
        {
            header("Location: http://localhost:8888/mdanish-phase2/homepage.php");
            exit();
        }
    }


    else{
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }


        bubbleSort($rows);



        $stack = array();
        foreach ($rows as $row) {
            array_push($stack, $row);
        }

        $reversed = array();
        while (!empty($stack)) {
            array_push($reversed, array_pop($stack));
        }

        $rows = $reversed;
     

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/reset.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/nav.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/blog.css">
    <link rel="stylesheet" href="http://localhost:8888/mdanish-phase2/css/mediablog.css">
    <script src="http://localhost:8888/mdanish-phase2/js/blog.js"></script>

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
            
            <div class="select-box">
                <div class="stitle"> <h2>Choose a month</h2></div>
                <form action="" method="GET" id="month_form"> 
                    <select name="month" id="month" class="month_form">
                        <option value="">Select a month</option>
                        <option value="all"> All months</option>
                        <?php foreach($months as $month): ?>
                            <option value="<?php echo $month['month'] ?>"> <?php echo $month['month'] ?></option>
                        <?php endforeach; ?>
            
                        
            
                    </select>
                </form>
            </div>

                

<?php
        foreach($rows as $row) 
        {

?>

        <br>



        <div class="box">
            <div class="time"><p><?php format($row['event_datetime']); ?></p></div>
            <div class="title"><h2><?php echo $row['title']; ?></h2>
            <p>_______________</p></div>
            
            <div class="description"><p><?php echo $row['description']; ?></p></div>

            <?php
            $post_id = $row['ID'];
            $sql_comment = "SELECT * FROM COMMENTS WHERE post_id = '$post_id'";
            $result_comment = mysqli_query($conn, $sql_comment);
            ?>
            <div class="comment-section">
            <?php
            
                while($row_comment = mysqli_fetch_assoc($result_comment)) {
                    ?>
                    <div class="comment-box">
                        <div class="comments">
                            <p class="content-item"><?php echo $row_comment['text']; ?></p>
                        </div>

                            <?php

                            if(!empty($_SESSION) && isset($_SESSION['email']) && isset($_SESSION['password']))
                            {
                                $sql_admin = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                                $result_admin = mysqli_query($conn, $sql_admin);
                                if(mysqli_num_rows($result_admin)>0){
                                    ?>
                                    <div class="delete-button">
                                        <form action="http://localhost:8888/mdanish-phase2/php/deletecomment.php" method="POST">
                                            <input type="hidden" name="comment_id" value="<?php echo $row_comment['ID']; ?>">
                                            <input type="submit" value="Delete Comment" name="submit" class="black">
                                        </form>
                                    </div>
                                    <?php
                                }

 
                            }

                            ?>


                    </div>
                    


                    <?php


                }

            ?>


            <?php

            if(!empty($_SESSION) && isset($_SESSION['email']) && isset($_SESSION['password']))
            {
                $sql_admin = "SELECT * FROM ADMIN WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                $result_admin = mysqli_query($conn, $sql_admin);
                if(mysqli_num_rows($result_admin)>0)
                {
                    ?>
                    <div class="button">
                        <form action="http://localhost:8888/mdanish-phase2/php/deletepost.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row['ID']; ?>">
                            <input type="submit" value="Delete post" name="submit" class="black">
                        </form>
                    </div>
                    <?php
                }

            }

            ?>



            </div>

            <?php


            if(!empty($_SESSION) && isset($_SESSION['email']) && isset($_SESSION['password']))
            {
                $sql_user = "SELECT * FROM USERS WHERE email = '$_SESSION[email]' AND password = '$_SESSION[password]'";
                $result_user = mysqli_query($conn, $sql_user);

                if(mysqli_num_rows($result_user)>0)
                {
                    ?>

                       <button class="add-comment-button" data-post-id="<?php echo $row['ID']; ?>"> Add a comment</button>
                 
                    <?php
                }
            }




            ?>

            <hr>

            
            
        </div>

<?php

        }
        ?>



            
        </main>
    </div>
</body>
</html>


    
<?php
}

?>