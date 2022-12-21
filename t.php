<?php
    $writeText = "50" . "\r\n";
    $writeText .= "off" . "\r\n";
    $writeText .= "on";

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $writeText);

    fclose($writeData);
?>