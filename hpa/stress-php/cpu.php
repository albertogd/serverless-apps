<?php
$seconds = $_REQUEST['minutes'] * 60;
ini_set('max_execution_time', $seconds+60);
print "<h1>CPU Stress Application for testing HPA</h1>";
print "Starting to stress CPU during $minutes minutes...";
flush();

for(set_time_limit($seconds);;);
$load = sys_getloadavg();
print "Finihsed CPU Test Load in {$minutes} minutes. Current average load: {$load[0]}";
?>
