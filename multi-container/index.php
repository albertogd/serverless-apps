<?php
// Connecting, selecting database
$link = mysql_connect($_ENV["MYSQL_HOST"], $_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"])
    or die('Could not connect: ' . mysql_error());

mysql_select_db($_ENV["MYSQL_DATABASE"]) or die('Could not select database');

// Performing SQL query
$query = 'SELECT * FROM ' . $_ENV["MYSQL_TABLE"];
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
