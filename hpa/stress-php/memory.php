<?php

echo "<h1>Memory Stress Application for testing HPA</h1>";

$memory_limit = get_memory_limit();
echo "Memory Limit: $memory_limit <br />";

$initMemory = $currentMemory = memory_get_usage();
echo "Initial memory usage: $initMemory <br /><br />";

$size = intval($_REQUEST['size'])
$minutes =  intval($_REQUEST['minutes'])

flush()

echo "Allocated $size MB<br />";
$myArray = array_fill(0, $size * 1000000, "z");

sleep($minutes * 60)

?>
