<?php
include 'form.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); // Sanitize string
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['Password'];
    $confirmPassword = $_POST['ConfirmPassword'];
    $gender = $_POST['Gender'];

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($gender) ){
            echo "Please fill all the details.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid email format.";
    } elseif($password != $confirmPassword){
        echo "Passwords do not match";
    }
    else{
        $sql = "INSERT INTO form_table (name, email, password, confirm_password, gender) VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param("sssss", $name, $email, $password, $confirmPassword, $gender);

        if($stmt -> execute()){
            echo "Data Submitted Successfully";
        } else{
            echo "Error: " . $conn -> error;
        }

        $stmt -> close();
    }
    $conn->close();
}




?>