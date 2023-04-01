<?php include_once "head.php" ?>

<div class="p-3">
   <h1 class="">Area Calculator</h1>
   
   <?php include_once "server.php"?>
   <form  method="post">
      <div class="row g-3">
         <div class="col-3">
            <input class=" form-control" type="number" name="width" placeholder="width" required>
         </div>
         <div class="col-3">
           <input class=" form-control" type="number" name="breadth" placeholder="breadth" required>
         </div>
         <div class="col-3">
            <button class=" btn btn-primary" name="area_cal">Cal</button>
         </div>
      </div>
   </form>

   <?php 
     if(is_dir($folderName)):
      $records = array_filter(scandir($folderName),fn($r)=> $r != "." && $r != "..");
      // print_r($records);
     

     if(count($records)):
   
   ?>
   <table class=" table table-bordered mt-3">
      <thead>
         <tr>
            <th>Width</th>
            <th>Breadth</th>
            <th>Area</th>
            <th>Control</th>
         </tr>
      </thead>
      <tbody>
         <?php
            foreach($records as $record):
            $currentFile = $folderName."/".$record;
            $json = fopen($currentFile,"r");
            $j = fread($json,filesize($currentFile));
            $arr = json_decode($j,true);
            
         ?>
         <tr>
         <td>
              <?= $arr["width"] ?>ft
            </td> <td>
              <?= $arr["breadth"] ?>ft
            </td> <td>
              <?= $arr["area"] ?>sqft
            </td>
            <td>
               <a onClick="return confirm('Are you sure to delete?')" href="area-del.php?name=<?= $record ?>" class=" btn btn-sm btn-outline-danger">Del</a>
            </td>
         </tr>
          <?php endforeach; ?>
      </tbody>
   </table>

   <?php endif ;?>
   <?php endif ;?>
</div>

<?php include_once "footer.php" ?>