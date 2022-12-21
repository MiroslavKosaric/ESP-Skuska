<?php
    // data variables
    $blinds = $fan = $outdoorLight = "";

    // reading data
    $readTextArray = file('data.txt');

    $blinds = $readTextArray[0];
    $fan = $readTextArray[1];
    $outdoorLight = $readTextArray[2];


    // writing data
    // $dom = new DOMDocument('1.0', 'iso-8859-1');
    // $dom->validateOnParse = true;
    // $blinds = $dom->getElementById('slider')->value;

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (isset($_POST['blinds'])) {
            $blinds = $_POST['blinds'];
        } else {
            $blinds = $readTextArray[0];
        }

        if (isset($_POST['fan'])) {
            if ($fan == "fan: off") $fan = "fan: on\n";
            if ($fan == "fan: on") $fan = "fan: off\n";
        } else {
            $fan = $readTextArray[1];
        }

        if (isset($_POST['outdoorLight'])) {
            if ($outdoorLight = "outdoorLight: off") $outdoorLight = "outdoorLight: on";
            if ($outdoorLight = "outdoorLight: on") $outdoorLight = "outdoorLight: off";
        } else {
            $outdoorLight = $readTextArray[2];
        }


        $writeText = "blinds: " . $blinds . "\n";
        $writeText .= $fan;
        $writeText .= $outdoorLight;

        $writeData = fopen("data.txt", "w") or die("Unable to open file!");
        fwrite($writeData, $writeText);

        fclose($writeData);
    }
?>

<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/house.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" type="text/css" media='screen and (max-width: 600px)' href="css/mobile.css">
    <link rel="stylesheet" type="text/css" media='screen and (min-width: 601px)' href="css/style.css">
    <script type="text/javascript" src="js/main.js"></script>
    
    <title>SmartHome Ovládacie centrum</title>
</head>
<body onload="setIndicatorColors()">

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php"><img src="images/sk_flag.png" id="sk" class="lang"></a>
        <a href="lang/indexEN.php"><img src="images/en_flag.png" id="en" class="lang"></a>
        <br>
        <a href="#"><img src="images/es_flag.png" id="es" class="lang"></a>
        <br>
        <a href="#"><img src="images/fr_flag.png" id="fr" class="lang"></a>
    </div>

    <header>
        <h1>KGBSmartHome Ovládacie centrum</h1>
        
        <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776; Languages</span>

        <!-- <div class="languages">
            <a href=""><img src="images/sk_flag.png" id="sk" class="lang"></a>
            <a href="lang/indexEN.php"><img src="images/en_flag.png" id="en" class="lang"></a>
        </div> -->
    </header>

    <main>
        <center>
            <section class="controlPanelContainer">
                <h2 class="heading">Ovládací panel</h2>
                <form class="controlPanel" action="" method="POST">
                    <label for="blinds">Žalúzie</label>
                    <p id="blindsIndicator" class="indicator blindsIndicator">&#9679;</p>
                    <div class="slider">
                        <input id="slider" name="blinds" type="range" min="0" max="100" value="0" oninput="changeRangeIndicatorColor()"/>
                    </div>
    
                    <br>
                    <label for="fan">Ventilátor</label>
                    <p class="indicator fanIndicator">&#9679;</p>
                    <input type="submit" name="fan" class="toggleFan" onclick="changeIndicatorColor('fanIndicator')" value="Zmeniť"/>
    
                    <br><br>
                    <label for="outdoorLight">Vonkajšie svetlo</label>
                    <p class="indicator outdoorLightIndicator">&#9679;</p>
                    <input type="submit" name="outdoorLight" class="toggleOutdoorLight" onclick="changeIndicatorColor('outdoorLightIndicator')" value="Zmeniť"/>
                    <br><br>
                
                    <center>
                    <input type="submit" value="Uložiť zmeny"/>
                    </center>
                </form>
            </section>
        </center>
    </main>

    <footer>
        <center>
            <p>S ❤️ vytvorila spoločnosť KGB.</p>
            <p>&#169;2022</p>
        </center>
    </footer>
</body>
</html>