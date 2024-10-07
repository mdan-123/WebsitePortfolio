<?php
session_start();
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment'];

    $sql = "INSERT INTO COMMENTS (post_id, text) VALUES ('$post_id', '$comment_text')";
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost:8888/mdanish-phase2/blog.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Request method not post";
}
?>
