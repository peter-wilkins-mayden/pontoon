<?php

include_once 'vendor/autoload.php';

$game = new Game(['Peter', 'Connor', 'Lucia'], 20, 4);
$game->runGame();
