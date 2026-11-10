<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'] ?? '';
$lookup = $_GET['lookup'] ?? '';
if( $lookup == "cities"){
  $stmt = $conn->query("SELECT c.name, c.district, c.population FROM countries cs JOIN cities c ON cs.code=c.country_code WHERE cs.name LIKE '%$country%'");
} else {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($lookup == 'cities'): ?>
  <table>
  <thead> 
    <tr> 
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($results as $row): ?>
  <tr>
    <td> <?= $row['name']; ?></td>
    <td> <?= $row['district']; ?></td>
    <td> <?= $row['population']; ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
<table>
  <thead> 
    <tr> 
      <th>Name</th>
      <th>Continent</th>
      <th>Independency</th>
      <th>Head of State</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($results as $row): ?>
  <tr>
    <td> <?= $row['name']; ?></td>
    <td> <?= $row['continent']; ?></td>
    <td> <?= $row['independence_year']; ?></td>
    <td> <?= $row['head_of_state']; ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>
