<div class="container">
  <h3 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h3>
  <?php
  $ch='th01';
    if(isset($_POST['Add'])){
      $teachnology_Name = $_POST['teachnology_Name'];
        $sql = "INSERT INTO teachnology (teachnology_Name) VALUES ('$teachnology_Name')";
        if($teachnology_Name != ""){
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
      <label for="Technology_Name">Technology Name</label>
      <input type="text" class="form-control" name="teachnology_Name" aria-describedby="emailHelp" placeholder="Enter Technology Name" required>
    </div>
      <button type="submit" name="Add" class="btn btn-primary">Add</button>
  </form>


</div>
