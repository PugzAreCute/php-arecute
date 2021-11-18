<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, "");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
$parsedJSON = json_decode (curl_exec($curl));
print_r( $parsedJSON->build[0]->status)
?>
<div class="ci_build">
    <h3>Build #{Build_Number}</h3>
    <h4>Build status: </h4>
</div>
<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img alt="Powered By Vercel!"
                                                                        src="../img/Vercel.svg"></a>
</body>
</html>