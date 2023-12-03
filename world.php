<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
?>

<?php
if (isset($_GET['query'])) {
  $country = $_GET['query'];
  $bool=True;
} else {
  $bool=False;
}
?>

<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
if($bool==True){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}
else{
  $stmt = $conn->query("SELECT * FROM countries");
}





$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<table>
 <thead>
 <tr>
 <th>Name</th>
 <th>Continent</th>
 <th>Independence</th>
 <th>Head of STate</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($results as $row): ?>
<tr>
 <td><?= $row['name']; ?></td>
 <td><?= $row['continent']; ?></td>
 <td><?= $row['independence_year']; ?></td>
 <td><?= $row['head_of_state']; ?></td>
</tr>
 <?php endforeach; ?>
 </tbody>
</table>


