<?php
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Database connection
    $conn = new mysqli('localhost','root','','sipdatabase');
    if ($conn->connect_error) {
        die('Connection Failed: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into message_us(full_name, email, message)
            values(?,?,?)");
        $stmt->bind_param("sss",$fullName,$email,$message);
        $stmt->execute();
        $alert = "<script>alert('Your message has been submitted successfully!');</script>";
        echo $alert;
        header("Location: home.html");
        $stmt->close();
        $conn->close();
    }

?>