<?php
$connection = new mysqli("localhost", "id21722166_andrea", "Dogcat123!", "id21722166_contacts") or exit ('Could not connect to the database.');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


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
$sql = "INSERT INTO contacts (id, name, last_name, phone_number, email, content) 
    VALUES (DEFAULT, '$name', '$last_name', '$phone_number', '$email', '$content')";
if ($connection->query($sql) === TRUE) {
    echo "¡Successful registration!";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
$connection->close();



?>