<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullName"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $type = $_POST["propertyType"];
    $address = $_POST["address"];

    // Include DB config
    include("db/config.php");

    $sql = "INSERT INTO properties (name, email, phone, type, address)
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $type, $address);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $conn->close();
}
?>