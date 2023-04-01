<?php
$folderName = "ex-records";
 $apiData =file_get_contents('http://forex.cbm.gov.mm/api/latest');
 $apiData = json_decode($apiData,true);
 
 $rates = $apiData['rates'];


//  print_r($rates); 
//  print_r($_POST);

 if(isset($_POST['calc'])) :
    $amount = $_POST["amount"];
    $from = $_POST['from'];
    $to= $_POST['to'];

    //  print_r($amount);


    $mmk = $amount * str_replace(",","",$rates[$from]);

    $result =  $mmk / str_replace(",","",$rates[$to]);

 
 ?>

 <div class=" bg-light border-3 p-3">
    <p class=" mb-0 text-black-50"> From <?= $amount ?> <?= $from ?> to <?= $to ?> </p>
    <h1 class=" fw-bold">
        <?= round($result,2) ?>
        <?= $to ?>
    </h1>
 </div>
 <?php 
 
   $json = json_encode(["from"=>$from,"to"=>$to,"amount"=>$amount,"result"=>round($result,2)]);
 
  if(!is_dir($folderName)){
      mkdir($folderName);
  }

  $fileName = "record".uniqid().".json";
  $fileStream = fopen($folderName."/".$fileName,"w");
   fwrite($fileStream,$json);
   fclose($fileStream);
 ?>

 <?php endif ; ?>

 