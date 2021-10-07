<?php
    class DataMan extends SQLite3{
        function __construct()
        {
            $this->open("test.db");
        }
    }
    $database = new DataMan();
    if(!$database){
        echo $database->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

    $cmds = <<<EOF
CREATE TABLE LINKS (
    LINK varchar(1024),
    REMOTE varchar(8192)
)
EOF;