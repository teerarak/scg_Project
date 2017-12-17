<div class="container">
  <h3 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h3>
  <?php
  $ch='th01';
    if(isset($_POST['Add'])){
      $status_name=$_POST['status_name'];
        $sql = "INSERT INTO status (status_name) VALUES ('$status_name')";
        if($status_name != ""){
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
      <label for="Status_Name">Status Name</label>
      <input type="text" class="form-control" name="status_name" aria-describedby="emailHelp" placeholder="Enter Status Name" required>
    </div>
      <button type="submit" name="Add" class="btn btn-primary">Add</button>
  </form>


</div>
