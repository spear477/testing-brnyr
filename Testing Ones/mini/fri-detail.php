<?php

$friends = [];
$dataFileName = "friend-data.json";

if(file_exists($dataFileName) && filesize($dataFileName)){
   // echo "file shi tl";
   $friends = json_decode(file_get_contents($dataFileName,true));


}