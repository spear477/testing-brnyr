<?php

$filePath = "area_records/".$_GET["name"];

if(is_file($filePath)){
    unlink($filePath);
}

header("Location:area.php");