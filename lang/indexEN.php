<?php
    // data variables
    $blinds = $fan = $outdoorLight = $text = "";

    $blinds = $_POST["blinds"];
    $fan = $_POST["fan"];
    $outdoorLight = $_POST["outdoorLight"];

    $text = "blinds: " .  "\r\n";
    $text .= "fan: " . $fan . "\r\n";
    $text .= "outdoorLight: " . $outdoorLight;

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $text);

    fclose($writeData);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/house.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="../node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" type="text/css" media='screen and (max-width: 600px)' href="../css/mobile.css">
    <link rel="stylesheet" type="text/css" media='screen and (min-width: 601px)' href="../css/style.css">
    <script type="text/javascript" src="../js/main.js"></script>

    <title>SmartHome Control Centre</title>
</head>
<body onload="setIndicatorColors()">
<header>
    <h1>KGBSmartHome Control Centre</h1>
    <span>
        <ul class="languages">
            <li><a href="../index.php"><img src="../images/sk_flag.png" id="sk" class="lang"></a></li>
            <li><a href="indexEN.php"><img src="../images/en_flag.png" id="en" class="lang"></a></li>
        </ul>
    </span>
</header>

<main>
    <center>
        <section class="controlPanelContainer">
            <h2 class="heading">Control panel</h2>
            <form class="controlPanel" action="" method="POST">
                <label for="blinds">Blinds</label>
                <p id="blindsIndicator" class="indicator blindsIndicator">&#9679;</p>
                <div class="slider">
                    <input id="slider" name="blinds" type="range" min="0" max="100" value="50" oninput="changeRangeIndicatorColor()">
                </div>

                <br><br>
                <label for="fan">Fan</label>
                <p class="indicator fanIndicator">&#9679;</p>
                <input type="button" name="fan" class="toggleFan" onclick="changeIndicatorColor('fanIndicator')" value="Toggle">

                <br><br>
                <label for="outdoorLight">Outdoor light</label>
                <p class="indicator outdoorLightIndicator">&#9679;</p>
                <input type="button" name="outdoorLight" class="toggleOutdoorLight" onclick="changeIndicatorColor('outdoorLightIndicator')" value="Toggle">
            </form>
        </section>
    </center>
</main>

<footer>
    <center>
        <p>Made with ❤️ by KGB company.</p>
        <p>&#169;2022</p>
    </center>
</footer>
</body>
</html>
