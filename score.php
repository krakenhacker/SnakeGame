<?php
//header("refresh:5;url=snake.gr");
$nickname = $_POST['name'];
$formhighscore = $_POST['highscore'];
$servername = "localhost:3535";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password,'snakedb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlcheck = "SELECT nickname FROM scores WHERE nickname='$nickname'";
$result = mysqli_query($conn,$sqlcheck);

if(mysqli_num_rows($result)==0){
    $sqlinsert = "INSERT INTO scores (nickname, score) VALUES ('$nickname', '$formhighscore')";
    if ($conn->query($sqlinsert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlinsert . "<br>" . $conn->error;
    }
}else {
    $sqlupdate = "UPDATE scores SET score='$formhighscore' WHERE nickname='$nickname'";
    if($conn->query($sqlupdate) === TRUE){
        echo "New record updated successfully";
    } else {
        echo "Error: " . $sqlusqlupdate . "<br>" . $conn->error;
    }
}
$conn->close();

?>