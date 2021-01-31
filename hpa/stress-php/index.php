<?php
print "<html>";
print "<h1>CPU Stress Application for testing HPA</h1>";
print "Stress CPU for a minute: <a href=http://{$_SERVER['HTTP_HOST']}/cpu.php?minutes=1>CPU Stress</a><br />";
print "Allocate 200MB of Memory for a minute: <a href=http://{$_SERVER['HTTP_HOST']}/memory.php?minutes=1&size=200>Memory allocation</a>";
print "</html>";
?>
