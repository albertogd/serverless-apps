<?php
$minutes = (int)$_REQUEST['minutes'];
$seconds = $minutes * 60;
$timeout = time() + $seconds;

// Increase Max Execution Time as default is 30 seconds
ini_set('max_execution_time', $seconds+60);
set_time_limit=$seconds+60;

// We try to print output in real time
ob_implicit_flush();
print "<h1>CPU Stress Application for testing HPA</h1>";
print "Starting to stress CPU during $minutes minutes...";

// Infinite loop until timeout
for ($i = 7777777; $current_time <= $timeout; $i++) {
   $i = $i * $i;
   $current_time = time();
}
//for(set_time_limit($seconds);;);

$load = sys_getloadavg();
print "Finihsed CPU Test Load in {$minutes} minutes. Current average load: {$load[0]}";
?>
