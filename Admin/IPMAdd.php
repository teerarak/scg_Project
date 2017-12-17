<div class="container">
  <h3 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h3>
  <?php
  $ch='th01';
    if(isset($_POST['Add'])){
      $IPM_name=$_POST['IPM_name'];
        $sql = "INSERT INTO IPM (IPM_name) VALUES ('$IPM_name')";
        if($IPM_name != ""){
          $query_select_moc = $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
        }
        else {
          echo '<div class="alert alert-danger" role="alert">
                  fail
                </div>';
        }

    }
   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="IPM_Name">IPM Name</label>
      <input type="text" class="form-control" name="IPM_name" aria-describedby="emailHelp" placeholder="Enter IPM Name" required>
    </div>
      <button type="submit" name="Add" class="btn btn-primary">Add</button>
  </form>


</div>
