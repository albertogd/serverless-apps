<?php
// Connecting, selecting database
$mysqli = new mysqli($_ENV["MYSQL_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);

if ($mysqli->connect_errno) {
  echo "Failed to connect to database";
  echo "Error: " . $mysqli->connect_error . "\n";
}

// Performing SQL query
$sql = 'SELECT * FROM ' . $_ENV["MYSQL_TABLE"];

if (!$result = $mysqli->query($sql)) {
    echo "Error executing the query " . $sql . "\n";
    echo "Error: " .  $mysqli->error . "\n";
}

echo "<ul>\n";
while ($student = $result->fetch_assoc()) {
    echo "<li>Estudiante : " . $student['name'] . "</li>\n";
}
echo "</ul>\n";

?>
