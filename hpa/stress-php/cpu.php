<?php
$minutes = $_REQUEST['minutes'];
echo "<h1>CPU Stress Application for testing HPA</h1>";
echo "Starting to stress CPU during $minutes minutes...";
flush()

for(set_time_limit($minutes);;);
$load = sys_getloadavg();
println("Finihsed CPU Test Load in {$minutes} minutes. Current average load: {$load[0]}");
?>
