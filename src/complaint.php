<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $Complaint = $_POST['Complaint'];

    //Database connection
    $conn = new mysqli('localhost','root','','sipdatabase');
    if ($conn->connect_error) {
        die('Connection Failed: '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into register_complaint(name, email, phone, address, complaint)
            values(?,?,?,?,?)");
        $stmt->bind_param("sssss",$name,$email,$phone,$address,$Complaint);
        $stmt->execute();
        echo "Your complaint has been filed successfully!";
        echo " We will get in touch with you shortly via your email";
        $stmt->close();
        $conn->close();
    }

?>