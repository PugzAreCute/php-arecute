<?php
    if(isset($_SERVER['HTTP_X_SECURITY_KEY'])){
        if (isset($_SERVER['HTTP_X_GAME_CODE'])){
            if(isset($_SERVER['HTTP_X_COMMAND'])){
                $gamefile = fopen("/tmp/".$_SERVER['HTTP_X_GAME_CODE'],"r+");
                if($gamefile!=false){
                    echo fread($gamefile,filesize("/tmp/".$_SERVER['HTTP_X_GAME_CODE']));
                    if($_SERVER['HTTP_X_COMMAND'] == "AUTH"){
                        echo "200 AUTH COMMAND RECIEVED";
                    }
                }
            }
        }
    }
