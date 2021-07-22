<!DOCTYPE html>
<html lang="en">
<head>

    <title>WIP</title>
    <link rel="stylesheet" href="../css/main.css">
    </head>
<body>
<ul id="nav">
    <li><a href="/">Home</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="embed.html">Discord embed generator</a></li>
    <li><a href="/iputils">IP Utilities</a></li>
</ul>
<?php
//phpinfo();
echo "<h1> IP Address: ".$_SERVER['REMOTE_ADDR']."</h1>";
//echo "<h1> ASN: ".geoip_asnum_by_name($_SERVER["REMOTE_ADDR"])."</h1>";
?>

<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img src="../powered-by-vercel.svg"></a>
</body>
</html>