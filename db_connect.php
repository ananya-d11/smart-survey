<?php
$conn = new mysqli("localhost", "root", "", "smart_survey");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
