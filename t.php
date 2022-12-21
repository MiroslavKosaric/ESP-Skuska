<?php
    $writeText = "0" . "\n";
    $writeText .= "off" . "\n";
    $writeText .= "off";

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $writeText);

    fclose($writeData);
?>