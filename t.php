<?php
    $writeText = "70" . "\n";
    $writeText .= "off" . "\n";
    $writeText .= "on";

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $writeText);

    fclose($writeData);
?>