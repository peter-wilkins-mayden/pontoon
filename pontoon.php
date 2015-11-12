<?php

include_once 'vendor/autoload.php';

if(isset($argv[1])) {

    $game = new Game(['Peter', 'Connor', 'Lucia'], 20, 4);
    $game->runGame($argv[1]);

}
else{
    echo 'Argument missing';
}