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
  echo "No 'query' variable found in the GET request.";
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
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>


