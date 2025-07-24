<?php
include '../includes/db_connect.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="survey_responses.csv"');
$output = fopen("php://output", "w");
fputcsv($output, ['ID', 'Name', 'Email', 'Age', 'Gender', 'Likes PHP', 'Reason']);
$res = $conn->query("SELECT * FROM responses");
while($row = $res->fetch_assoc()) {
  fputcsv($output, $row);
}
fclose($output);
?>
