<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
include '../includes/db_connect.php';
?>
<h2>Welcome, Admin</h2>
<a href="logout.php">Logout</a> | 
<a href="export.php">Download CSV</a>
<canvas id="chart" width="400" height="200"></canvas>

<table border="1">
<tr><th>Name</th><th>Email</th><th>Age</th><th>Gender</th><th>Likes PHP</th></tr>
<?php
$res = $conn->query("SELECT * FROM responses");
$yes = $no = 0;
while($row = $res->fetch_assoc()) {
  echo "<tr><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['age']}</td><td>{$row['gender']}</td><td>{$row['likes_php']}</td></tr>";
  $row['likes_php'] == 'Yes' ? $yes++ : $no++;
}
?>
</table>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chart').getContext('2d');
new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Yes', 'No'],
    datasets: [{
      data: [<?= $yes ?>, <?= $no ?>],
      backgroundColor: ['green', 'red']
    }]
  }
});
</script>
