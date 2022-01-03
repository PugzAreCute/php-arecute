<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PugsMods CI</title>
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
$availableBuilds = curl_init();
curl_setopt($availableBuilds, CURLOPT_RETURNTRANSFER, true);
curl_setopt($availableBuilds, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds?projectLocator=name:WoneWay");
curl_setopt($availableBuilds, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($availableBuilds, CURLOPT_CONNECTTIMEOUT, 5);
$availableBuildsJson = curl_exec($availableBuilds);
if ($availableBuildsJson == true) {
    echo "<h1>Click on a build card to download it.</h1>";
    $parsedJSON_buildList = json_decode($availableBuildsJson);
    foreach ($parsedJSON_buildList->build as $curr) {
        $buildcurl = curl_init();
        curl_setopt($buildcurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($buildcurl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($buildcurl, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds/id:" . $curr->id . "/artifacts/children");
        $buildArtifacts = json_decode(curl_exec($buildcurl));
        echo "<div>";
         if ($curr->status == "SUCCESS"){
            echo "<a href=\"https://argon.pugzarecute.com/ci" . $buildArtifacts->file[0]->content->href . "\">";
         }
        echo "<button class=\"ci_build\">
    <h3>Build #" . $curr->number . "</h3>
    <h4>Build status: " . $curr->status . "</h4>
    ";
    if ($curr->status == "SUCCESS"){
        echo "<p>Artifact Info:<br>File name: " . $buildArtifacts->file[0]->name . "<br>Size:" . $buildArtifacts->file[0]->size . " bytes<br>Build Time: " . $buildArtifacts->file[0]->modificationTime . "<br>Branch: ".$curr->branchName."</p>";
    }
    echo "</button>";
    if ($curr->status == "SUCCESS"){
        echo "</a>";
    }
    echo "</div>";
        curl_close($buildcurl);
    }
} else {
    echo "<h1>Uh Oh! Looks Like The CI server is down. Please try again later.</h1>";
}
curl_close($availableBuilds)
?>

<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img alt="Powered By Vercel!"
                                                                        src="../img/Vercel.svg"></a>
</body>
</html>