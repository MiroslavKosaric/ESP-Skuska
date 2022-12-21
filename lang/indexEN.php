<?php
    // data variables
    $blinds = $fan = $outdoorLight = $readText = $writeText = "";

    // reading data
    $readText = file_get_contents("data.txt");
    $readTextArray = explode(" ", $readText);

    foreach($readTextArray as $line) {
        $line = trim($line, "\n");
    }

    $blinds = $readTextArray[1];
    $fan = $readTextArray[3];
    $outdoorLight = $readTextArray[5];

    // writing data
    if (isset($_POST['blinds'])) {
        $blinds = $_POST["blinds"];
    } else {
        $blinds = $readTextArray[1];
    }

    if (isset($_POST['fan'])) {
        if ($fan == "off") $fan = "on";
        if ($fan == "on") $fan = "off";
    } else {
        $fan = $readTextArray[3];
    }

    if (isset($_POST['outdoorLight'])) {
        if ($outdoorLight = "off") $outdoorLight = "on";
        if ($outdoorLight = "on") $outdoorLight = "off";
    } else {
        $outdoorLight = $readTextArray[5];
    }

    if (isset($_POST['blinds']) || isset($_POST['fan']) || isset($_POST['outdoorLight'])) {
        $writeText = "blinds: " . $blinds . "\r\n";
        $writeText .= "fan: " . $fan . "\r\n";
        $writeText .= "outdoorLight: " . $outdoorLight;

        $writeData = fopen("data.txt", "w") or die("Unable to open file!");
        fwrite($writeData, $writeText);

        fclose($writeData);
    }
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
        <div class="languages">
            <a href="../index.html"><img src="../images/sk_flag.png" id="sk" class="lang"></a>
            <a href="indexEN.html"><img src="../images/en_flag.png" id="en" class="lang"></a>
        </div>
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

                    <br>
                    <label for="fan">Fan</label>
                    <p class="indicator fanIndicator">&#9679;</p>
                    <input type="button" name="fan" class="toggleFan" onclick="changeIndicatorColor('fanIndicator')" value="Toggle">
                    <!-- <span class="required">* <?php echo $numError;?></span> -->

                    <br><br>
                    <label for="outdoorLight">Outdoor light</label>
                    <p class="indicator outdoorLightIndicator">&#9679;</p>
                    <input type="button" name="outdoorLight" class="toggleOutdoorLight" onclick="changeIndicatorColor('outdoorLightIndicator')" value="Toggle"> 
                    <br><br>
                </form>
                <center>
                <input type="submit" value="Uložiť zmeny"/>
                </center>
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