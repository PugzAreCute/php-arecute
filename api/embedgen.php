<?php
    echo "<head>";
    echo "<link href='../css/main.css' rel='stylesheet'>";
    echo "<meta name=\"description\" content=\"".$_GET["description"]."\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
    echo "<meta property=\"og:title\" content=\"".$_GET["title"]."\">";
    if($_GET['video'] == "") echo "<meta property=\"og:type\" content=\"text/strings\">";
    else echo "<meta property=\"og:type\" content=\"video.other\">";
    echo "<meta property=\"og:url\" content=\"".$_GET["url"]."\">";
    echo "<meta property=\"og:description\" content=\"".$_GET["description"]."\">";
    echo "<meta property=\"og:image\" content=\"".$_GET["image"]."\">";
    echo "<meta name=\"theme-color\" content=\"#".$_GET["color"]."\">";
    echo "<meta name=\"og:video\" content=\"".$_GET["video"]."\">";
    echo "<meta name=\"og:video:secure_url\" content=\"".$_GET["video"]."\">";
    echo "<meta name=\"og:video:type\" content=\"video/mp4\">";
echo "<meta property=\"og:video:width\" content=\"400\" />";
echo "<meta property=\"og:video:height\" content=\"300\" />";
    echo "</head>";
    echo "<body><h1> Paste "."https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']." In your favourate chat app that supports OG to preview this embed</h1></body>";

