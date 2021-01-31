<?php
print "<html>";
print "<h1>CPU Stress Application for testing HPA</h1>";
print "<a href=http://{$_SERVER['HTTP_HOST']}/cpu.php?minutes=1>CPU</a>";
print "<a href=http://{$_SERVER['HTTP_HOST']}/memory.php?minutes=1&size=200>Memory</a> ";
print "</html>";
?>
