<?php
    if($_GET["token"] = getenv("TEST_KEY")){
        echo("Token matched! Token: ".getenv("TEST_KEY"));
    }