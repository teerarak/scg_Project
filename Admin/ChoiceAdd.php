<div class="container">
  <h3 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h3>
  <?php
  $ch='th01';
    if(isset($_POST['Add'])){
      $Choice_name=$_POST['Choice_name'];
        $sql = "INSERT INTO Choice (Choice_name) VALUES ('$Choice_name')";
        if($Choice_name != ""){
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
      <label for="Choice_Name">Choice Name</label>
      <input type="text" class="form-control" name="Choice_name" aria-describedby="emailHelp" placeholder="Enter Choice Name" required>
    </div>
      <button type="submit" name="Add" class="btn btn-primary">Add</button>
  </form>


</div>
