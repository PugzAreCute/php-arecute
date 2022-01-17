<?php
if ($_SERVER['HTTP_X_START_SESSION'] == "TRUE"){
    $gamePath=tempnam("/tmp","game-");
    echo $gamePath;
    echo "200 Request Accepted. No further actions needed";
    echo "200 Login credentials sent through response headers. Please authorize in a few seconds to make sure that your game has been created.";
}