<?php
    $writeText = "blinds: " . "50" . "\r\n";
    $writeText .= "fan: " . "off" . "\r\n";
    $writeText .= "outdoorLight: " . "on";

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $writeText);

    fclose($writeData);
?>