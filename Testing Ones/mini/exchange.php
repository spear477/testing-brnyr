<?php include_once "head.php" ?>
<div class="p-3">
    <h1>Exchange Calculator</h1>
    <?php 
     
      require_once "./logic.php";
    
    ?>
    <form  id="exForm" method="post"></form>
    <div class=" row g-3">
        <div class="col-12">
            <label class="form-label" for="">Amount</label>
            <input type="number" name="amount" form="exForm" class="form-control" placeholder="Enter your amount" required>
        </div>
        <div class="col-6">
            <label for="" class="form-label">From Currency</label>
            <select name="from" id="" form="exForm" class="form-select" required>
                <option value="">Select</option>
                <?php foreach ($rates as $key=>$value): ?>
                    <option value="<?= $key ?>">
                        <?= $key ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-6">
            <label for="" class="form-label">From Currency</label>
            <select name="to" id="" class="form-select" form="exForm" required>
                <option value="">Select</option>
                <?php foreach ($rates as $key=>$value): ?>
                    <option value="<?= $key ?>">
                        <?= $key ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12">
            <button name="calc" class=" btn btn-outline-primary  btn-lg w-100" form="exForm">Calculate</button>
        </div>
    </div>

    <?php 
     if(is_dir($folderName)):
      $records = array_filter(scandir($folderName),fn($r)=> $r != "." && $r != "..");
      // print_r($records);
     

     if(count($records)):
   
   ?>
   <table class=" table table-bordered mt-3">
      <thead>
         <tr>
            <th>Amount</th>
            <th>Control</th>
            <th>Result</th>
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
              <?= $arr["amount"] ?>  <?= $arr["from"] ?>
            </td>
            
            <td>
               <a onClick="return confirm('Are you sure to delete?')" href="ex-del.php?name=<?= $record ?>" class=" btn btn-sm btn-outline-danger">Del</a>
            </td>
            <td>
              <?= $arr["result"] ?> <?= $arr["to"] ?>
            </td>
         </tr>
          <?php endforeach; ?>
      </tbody>
   </table>

   <?php endif ;?>
   <?php endif ;?>
</div>
<?php include_once "footer.php" ?>