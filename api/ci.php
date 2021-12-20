<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pugsmods CI</title>
    <link href="../css/main.css" rel="stylesheet">

    <meta content="Pugsmods CI" property="og:title">
    <meta content="text/strings" property="og:type">
    <meta content="https://www.pugzarecute.com/ci" property="og:url">
    <meta content="Pugsmods CI" property="og:description">
    <meta content="" property="og:image">
    <meta content="#9a67c7" name="theme-color">
</head>
<body>
<ul id="nav">
    <li><a class="hidden_link" href="/">Home</a></li>
    <li><a class="hidden_link" href="/contact">Contact</a></li>
    <li><a class="hidden_link" href="embed.html">Discord embed generator</a></li>
    <li><a class="hidden_link" href="/ci">CI</a></li>
</ul>
<?php
error_reporting(0);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds?projectLocator=name:WoneWay");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
$shouldContinueCurling = curl_exec($curl);
if ($shouldContinueCurling == true) {
    echo "<h1>Click on a build card to download it.</h1>";
    $parsedJSON_buildList = json_decode($shouldContinueCurling);
    foreach ($parsedJSON_buildList->build as $curr) {
        $buildcurl = curl_init();
        curl_setopt($buildcurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($buildcurl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($buildcurl, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds/id:" . $curr->id . "/artifacts/children");
        $buildArtifacts = json_decode(curl_exec($buildcurl));
        echo "<div><a href=\"https://argon.pugzarecute.com/ci" . $buildArtifacts->file[0]->content->href . "\"><button class=\"ci_build\">
    <h3>Build #" . $curr->number . "</h3>
    <h4>Build status: " . $curr->status . "</h4>
    <p>Artifact Info:<br>File name: " . $buildArtifacts->file[0]->name . "<br>Size:" . $buildArtifacts->file[0]->size . " bytes<br>Build Time: " . $buildArtifacts->file[0]->modificationTime . "</p>
</button></a></div>";

        curl_close($buildcurl);
    }
} else {
    echo "<h1>Uh Oh! Looks Like The CI server is down. Please try again later.</h1>";
}
curl_close($curl)
?>

<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img alt="Powered By Vercel!"
                                                                        src="../img/Vercel.svg"></a>
</body>
</html>