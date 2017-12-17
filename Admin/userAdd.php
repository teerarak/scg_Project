<div class="container">
  <h3 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h3>
  <?php
  $ch='th01';
    if(isset($_POST['Add'])){
      $Username=$_POST['Username'];
      $Password = md5($_POST['Password']);
      $Name=$_POST['name'];
      $work_ID=$_POST['work_ID'];
      $Position=$_POST['Position'];
      $section=$_POST['section'];
      $cell=$_POST['cell'];
      $status=$_POST['status'];
      $sql = "SELECT * FROM employee WHERE Username='$Username'";
      $result = $connect->query($sql);
      if ($result->num_rows <= 0) {
        $sql = "INSERT INTO employee (Username,Password,Name,Work_ID,Position,section,cell,Status)
        VALUES ('$Username','$Password','$Name','$work_ID','$Position','$section','$cell','$status')";
        $query_select_moc = $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
      }
      else {
        echo '<div class="alert alert-danger" role="alert">
            Username is depicate
              </div>';
      }

    }
   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="Username">Username</label>
      <input type="text" class="form-control" name="Username" aria-describedby="emailHelp" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input type="password" class="form-control" name="Password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="Password1">confirm Password</label>
      <input type="password" class="form-control" name="Password1" placeholder="confirm Password" required>
    </div>
    <div class="form-group">
      <label for="Name">name</label>
      <input type="text" class="form-control" name="name" placeholder="name" required>
    </div>
    <div class="form-group">
      <label for="Name">work_ID</label>
      <input type="text" class="form-control" name="work_ID" placeholder="work_ID" required>
    </div>
    <div class="form-group">
      <label for="Name">Position</label>
      <input type="text" class="form-control" name="Position" placeholder="Position" required>
    </div>
    <div class="form-group">
      <label for="Name">Section</label>
      <input type="text" class="form-control" name="section" placeholder="Section" required>
    </div>
    <div class="form-group">
      <label for="Name">Cell</label>
      <input type="text" class="form-control" name="cell" placeholder="Cell" required>
    </div>
    <div class="row">
      <div class="col-sm-2">Status</div>
      <div class="col-sm-10">
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="status" value="Approve" checked>
              Approve
            </label>
          </div>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="status" value="MOC">
            MOC
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="status" value="Manager">
            Manager
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="status" value="ADMIN">
            ADMIN
          </label>
        </div>
      </div>
    </div>

      <button type="submit" name="Add" class="btn btn-primary">Add</button>

  </form>


</div>
