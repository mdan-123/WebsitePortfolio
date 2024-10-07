<?php

    session_start();
    include_once("connection.php");


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['post_id']))
        {
            $id = $_POST['post_id'];
            $sql = "DELETE FROM STORAGE WHERE ID = '$id'";
            mysqli_query($conn, $sql);
            header("Location: http://localhost:8888/mdanish-phase2/blog.php");
        }
        else
        {
            echo "Post ID not set deleted";
        }
    }
    else
    {
        echo "Request method not post";
    }


?>