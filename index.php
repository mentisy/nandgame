<?php

require 'Export.php';

use Avolle\Nandgame\Export;


$levels = json_decode(file_get_contents("LevelsCompleted.json"), true);
$matrix = json_decode(file_get_contents('LevelMatrix.json'), true);

$export = new Export($matrix);


foreach($export->basicStorage($levels) as $storage) {

	echo $storage.'<br><br>';
}


foreach($levels as $level) {

    echo $export->writeLevel($level) . '<br><br>';
}
