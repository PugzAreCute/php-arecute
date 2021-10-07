<?php

$database = new new SQLite3('/tmp/db.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
if (!$database) {
    echo $database->lastErrorMsg();
} else {
    echo "Opened database successfully\n";
}

$cmds = <<<EOF
CREATE TABLE  IF NOT EXISTS LINKS(
    LINK varchar(1024),
    REMOTE varchar(8192),
    UNIQUE(LINK,REMOTE)
)
EOF;
$database->exec($cmds);
function processData($linkIn, $remoteIn)
{
    $database = new DataMan();
    $cmds = <<<EOF
INSERT INTO LINKS(LINK,REMOTE)
VALUES ($linkIn,$remoteIn)
EOF;
    $database->exec($cmds);

}

processData("a", "a");