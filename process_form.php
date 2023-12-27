<?php
$conexion = new mysqli("localhost", "id21722166_andrea", "Dogcat123!", "id21722166_contacts");

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}

// Get form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    // Validate content length
    if (strlen($content) < 10) {
        die("The content must be at least 10 characters.");
    }

    // Insert data into the database
    $sql = "INSERT INTO Contacts (name, last_name, phone_number, email, content) 
        VALUES ('$name', '$last_name', '$phone_number', '$email', '$content')";

    if ($conexion->query($sql) === TRUE) {
        echo "¡Successful registration!";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Connection error.";
}


