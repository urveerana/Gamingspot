<?php
require_once ('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['messagebtn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $messsage = $_POST['message'];

        if(!empty($name) && !empty($email) && !empty($messsage)) {
            $query = "INSERT INTO `customerfeedback`(`id`, `name`, `email`, `message`) VALUES (NULL ,'$name','$email','$messsage')";
            if (mysqli_query($mysqli, $query)) {
                echo '<script>alert("Message Sent")</script>';
                header("location: home.php");
                exit();
            }
        }
    }
}

?>