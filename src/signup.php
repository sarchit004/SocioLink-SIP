<?php
    $fullName = $_POST['name'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passwordSecure = password_hash($password, PASSWORD_DEFAULT);

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'sipdatabase');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        // Check if email already exists
        $sql = "SELECT * FROM login_register WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        
        if ($rowCount > 0) {
            echo "This Email already exists!";
        } else {
            $stmt = $conn->prepare("INSERT INTO login_register (full_name, phone_number, email, password)
                VALUES (?, ?, ?, ?)");
            // The "ssss" indicates string, string, string, string as data types for the bind variables
            $stmt->bind_param("ssss", $fullName, $phoneNumber, $email, $passwordSecure);
            $stmt->execute();
            echo "You have successfully been registered!";
            $stmt->close();
        }
        
        $conn->close();
    }
?>
