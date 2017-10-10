<?php

$ll=file("tocrack.txt");
$l=$ll[rand(0,count($ll)-1)];
echo $l;

?>
