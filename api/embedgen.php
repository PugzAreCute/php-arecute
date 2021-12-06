<head xmlns="http://www.w3.org/1999/html">
    <link href='../css/main.css' rel='stylesheet'>
    <?php
    echo "<meta name=\"description\" content=\"" . $_GET["description"] . "\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
    echo "<meta property=\"og:title\" content=\"" . $_GET["title"] . "\">";
    if ($_GET['video'] == "") echo "<meta property=\"og:type\" content=\"text/strings\">";
    else echo "<meta property=\"og:type\" content=\"video.other\">";
    echo "<meta property=\"og:url\" content=\"" . $_GET["url"] . "\">";
    echo "<meta property=\"og:description\" content=\"" . $_GET["description"] . "\">";
    echo "<meta property=\"og:image\" content=\"" . $_GET["image"] . "\">";
    echo "<meta name=\"theme-color\" content=\"#" . $_GET["color"] . "\">";
    echo "<meta name=\"og:video\" content=\"" . $_GET["video"] . "\">";
    echo "<meta name=\"og:video:secure_url\" content=\"" . $_GET["video"] . "\">";
    echo "<meta name=\"og:video:type\" content=\"video/mp4\">";
    echo "<meta property=\"og:video:width\" content=\"1920\"/>";
    echo "<meta property=\"og:video:height\" content=\"1080\"/>";
    ?>
</head>
<body>
<ul id="nav">
    <li><a href="/" class="hidden_link">Home</a></li>
    <li><a href="/contact" class="hidden_link">Contact</a></li>
    <li><a href="embed.html" class="hidden_link">Discord embed generator</a></li>
    <li><a class="hidden_link" href="/ci">CI</a></li>
</ul>
<?php
$destination = $_GET['url'];
$pageURL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$strippedURL = preg_replace("/&dnr=true/i", "", $_SERVER['REQUEST_URI']);
$pageURL = preg_replace("/&dnr=true/i", "", $pageURL);
echo "<h1 id='t2c'> Paste " . $pageURL . " In your favourite chat app that supports OG to preview this embed</h1>";
echo '<button class="ejen_button" onclick="copyToClipboard(\'' . $pageURL . '\')">Copy text</button>';
?>
<br>
<a href="https://vercel.com/?utm_source=pugsmods&utm_campaign=oss"><img src="../img/Vercel.svg"
                                                                        alt="Powered by vercel"></a>
<script src="../js/utils.js"></script>
<script>
    <?php
    echo 'window.history.pushState("","","' . $strippedURL . '")'
    ?>

    setTimeout(function () {
        <?php
        if (!isset($_GET["dnr"]) && isset($_GET['url']) && !empty($_GET['url'])) {
            echo "location.replace('" . $destination . "')";
        }
        ?>
    }, 200);
</script>
</body>