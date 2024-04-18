<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','sipdatabase');

    $sql = "SELECT * FROM login_register WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            header("Location: home.html");
            die();
        } else {
            echo "Password doesn't match!";
        }
    } else {
        echo "Email does not match!";
    }

?>