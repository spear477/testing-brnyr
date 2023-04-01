<?php


 $friends = [];
 $dataFileName = "friend-data.json";

 if(file_exists($dataFileName) && filesize($dataFileName)){
    // echo "file shi tl";
    $friends = json_decode(file_get_contents($dataFileName,true));


 }

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if($_FILES["fri_photo"]["error"] === 0){
        $dir = "friend-zone";
        $newName = $dir."/".uniqid()."-"."friend".".".
        pathinfo($_FILES['fri_photo']['name'])['extension'];

        move_uploaded_file($_FILES['fri_photo']['tmp_name'],$newName);

          $info = $_POST;
          $info['photo'] = $newName;

          array_push($friends,$info);

          $fdata = fopen($dataFileName,"w");

          fwrite($fdata,json_encode($friends));

        // $fdata = fopen("fdata.json","a");
       
        // $infoText = json_encode($info);
        // echo $infoText;
        // fwrite($fdata,$infoText);
        fclose($fdata);

        header("Location:friendCard.php");
    }
}