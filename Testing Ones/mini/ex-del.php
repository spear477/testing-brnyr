<?php

$filePath = "ex-records/".$_GET["name"];

if(is_file($filePath)){
    unlink($filePath);
}

header("Location:exchange.php");