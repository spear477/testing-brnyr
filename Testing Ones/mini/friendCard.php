<?php include_once "head.php" ?>
   <div class=" p-3">
      <h1 class="">Create Friend cards</h1>
      <form action="./fri-logic.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
             <label for="" class=" form-label">Friend Name</label>
             <input type="text" name="fri_name" required class=" form-control">
          </div>
          <div class="mb-3">
             <label for="" class=" form-label">Friend Phone</label>
             <input type="number" name="fri_phone" required class=" form-control">
          </div>
          <div class="mb-3">
             <label for="" class=" form-label">Friend Addresss</label>
             <textarea rows="3" name="fri_address" required class=" form-control"></textarea>
          </div>
          <div class="mb-3">
             <label for="" class=" form-label">Friend Photo</label>
             <input type="file" accept="image/jpeg,image/png" name="fri_photo" required class=" form-control">
          </div>

          <div class="mb-3">
              <input type="checkbox" id="isReal" name="isreal" value="yes" class=" form-check-inline">
              <label for="isReal" class=" form-check-label">Real Friend</label>
          </div>

          <button class=" btn btn-outline-primary">Create Friend Lists</button>
      </form>


      <div class="container my-5">
         
         <?php 
         $dataFileName = "friend-data.json";
         $friends = json_decode(file_get_contents($dataFileName),true);
         
         foreach($friends as $key=>$friend):
        ?>
        <div class="container">
            <div class="row">
               <div class="col-3">
                  <div class="card  mb-3 ">
                     <div class="card-body text-center ">
                           <div class="d-flex justify-content-between">
                                  <img src="<?= $friend['photo'] ?>" class="" width="100" height="100" alt="">
                                  <div class="">
                                    <h4><?= $friend['fri_name'] ?></h4>
                                    <p><?= $friend['fri_phone'] ?></p>
                                    <a href="./fri-detail.php?index=<?= $key ?>" class=" btn btn-outline-primary w-100 d-block mb-2">Detail</a>
                                    <a href="./fri-del.php?index=<?= $key ?>" class=" btn btn-outline-danger w-100 d-block">Delete</a>
                                  </div>
                           </div>
                              
                     </div>
          </div>
               </div>
            </div>
        </div>
        

         
        <?php endforeach; ?>
      </div>

    </div>
          
        
        
      </div>
   </div>
<?php include_once "footer.php" ?>