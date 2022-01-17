<?php
if ($_SERVER['HTTP_X_START_SESSION'] == "TRUE"){
    $gamePath=substr(tempnam("/tmp","game-"),5);
    $fileGame = fopen("/tmp/".$gamePath,"w");
    $randKey = substr(tempnam("/tmp",""),5);
    fwrite($fileGame,$randKey."\n");
    header("x-security-key: ".$randKey);
    header("x-game-code: ". $gamePath);
    echo "200 Request Accepted. No further actions needed";
    echo "200 Login credentials sent through response headers. Please authorize in a few seconds to make sure that your game has been created.";
    echo fread($fileGame,filesize("/tmp/".$gamePath));
    fclose($fileGame);
}