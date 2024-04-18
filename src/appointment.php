<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    //Database connection
    $conn = new mysqli('localhost','root','','sipdatabase');
    if ($conn->connect_error) {
        die('Connection Failed: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into book_appointment(name, email, phone, month, day, time, message)
            values(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssissss",$name,$email,$phone,$month,$day,$time,$message);
        $stmt->execute();
        echo "Your appointment has been submitted successfully!";
        $stmt->close();
        $conn->close();
    }

?>