<?php
include 'includes/db_connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$likes = $_POST['likes_php'];
$reason = $_POST['reason'];

$stmt = $conn->prepare("INSERT INTO responses (name, email, age, gender, likes_php, reason) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $name, $email, $age, $gender, $likes, $reason);
$stmt->execute();

// Send confirmation email
$to = $email;
$subject = "Thank You for Your Survey Submission!";
$message = "Hi $name,\n\nThanks for participating in the survey.\n\nRegards,\nSurvey Team";
$headers = "From: no-reply@survey.com";
mail($to, $subject, $message, $headers);

header("Location: success.html");
?>
