<?php

header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(isset($_GET['country']))
{

  $input = $_GET['country'];
  $country = filter_var($input, FILTER_SANITIZE_STRING);
  //REMOVED $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<table>
  <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
  </tr> 
<?php foreach ($results as $column): ?>
  <tr>
      <td><?= $column['name'];?></td>
      <td><?= $column['continent'];?></td>
      <td><?= $column['independence_year'];?></td>
      <td><?= $column['head_of_state'];?></td>
  </tr>
<?php endforeach; ?>
</table>
