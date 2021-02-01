<?php
$minutes = (int)$_REQUEST['minutes'];
$seconds = $minutes * 60;
$timeout = time() + $seconds;

// We try to print output in real time
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
