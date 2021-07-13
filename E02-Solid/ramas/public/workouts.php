<?php

use Kilo\Solid\Workout\Level;

require_once '../vendor/autoload.php';

$level = new Level(99);

echo '----------------------------------------------------------------<br/>';
// echo '<strong>Level:</strong><br/>';
// var_dump($level->isBeginner());
// echo '<br/>';
// var_dump($level->isIntermediate());
// echo '<br/>';
// var_dump($level->isAdvanced());
// echo '<br/>';
// var_dump($level->isPro());
echo $level->getClientLevel();
echo '<br/>------------------------------------------------<br/>';
