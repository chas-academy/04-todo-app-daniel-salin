<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Todo\Domain\Tasks;

$test = new Tasks("initiated");

echo $test->getTask();
echo "<br>";
echo $test->setTask("new task");
echo $test->getTask();