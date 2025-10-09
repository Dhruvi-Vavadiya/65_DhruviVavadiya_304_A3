<?php
ob_start();
    include("conn.php");

$result = $conn->query("SELECT * FROM users");

$xml = new SimpleXMLElement('<Users/>');

while ($row = $result->fetch_assoc()) {
    $student = $xml->addChild('student');
    $student->addChild('id', $row['id']);
    $student->addChild('name', $row['name']);
    $student->addChild('email', $row['email']);
    $student->addChild('password', $row['password']);
}

$xml->asXML('Users_output.xml');

echo "Data exported to Users_output.xml successfully!";
$conn->close();
?>
