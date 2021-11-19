<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>
<h1>Click on a build card to download it.</h1>
<?php
error_reporting(0);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds?projectLocator=name:WoneWay");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$parsedJSON_buildList = json_decode(curl_exec($curl));
//print_r( $parsedJSON->build);
foreach ($parsedJSON_buildList->build as $curr) {
    $buildcurl = curl_init();
    curl_setopt($buildcurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($buildcurl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($buildcurl, CURLOPT_URL, "https://argon.pugzarecute.com/ci/guestAuth/app/rest/builds/id:" . $curr->number . "/artifacts/children");
    $buildArtifacts = json_decode(curl_exec($buildcurl));
    echo "<div><a href=\"https://argon.pugzarecute.com/ci" . $buildArtifacts->file[0]->href . "\"><button class=\"ci_build\">
    <h3>Build #" . $curr->number . "</h3>
    <h4>Build status: " . $curr->status . "</h4>
    <p>Artifact Info:<br>Size:" . $buildArtifacts->file[0]->size . "<br>Build Time: " . $buildArtifacts->file[0]->modificationTime . "</p>
</button></a></div>";
    print_r($buildArtifacts->file);
}
?>

<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img alt="Powered By Vercel!"
                                                                        src="../img/Vercel.svg"></a>
</body>
</html>