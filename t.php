<?php
    $writeText = "70" . "\n";
    $writeText .= "on" . "\n";
    $writeText .= "off";

    $writeData = fopen("data.txt", "w") or die("Unable to open file!");
    fwrite($writeData, $writeText);

    fclose($writeData);
?>