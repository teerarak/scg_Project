<div class="container">
  <h3 class="text-center mt-3">แก้ไขข้อมูลสมาชิก</h3>
  <?php

    $sql = "SELECT * FROM employee WHERE User_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {

   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="Username">Username</label>
      <input type="text" value=<?php echo $row['Username'] ?> class="form-control" name="Username" aria-describedby="emailHelp"readonly>
    </div>
    <div class="form-group">
      <label for="Name">name</label>
      <input type="text" value=<?php echo $row['Name'] ?> class="form-control" name="name" placeholder="name" required>
    </div>
    <div class="form-group">
      <label for="Name">work_ID</label>
      <input type="text"  value=<?php echo $row['Work_ID'] ?> class="form-control" name="work_ID" placeholder="work_ID" required>
    </div>
    <div class="form-group">
      <label for="Name">Position</label>
      <input type="text" value=<?php echo $row['Position'] ?> class="form-control" name="Position" placeholder="Position" required>
    </div>
    <div class="form-group">
      <label for="Name">section</label>
      <input type="text" value=<?php echo $row['section'] ?> class="form-control" name="section" placeholder="section" required>
    </div>
    <div class="form-group">
      <label for="Name">Cell</label>
      <input type="text" value='<?php echo $row['cell'] ?>' class="form-control" name="cell" placeholder="Cell" required>
    </div>
    <div class="row">
      <div class="col-sm-2">Status</div>
      <div class="col-sm-10">
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="status" value="Approve" <?php if($row['Status']=='Approve'){echo 'checked';} ?>>
              Approve
            </label>
          </div>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="status" value="MOC" <?php if($row['Status']=='MOC'){echo 'checked';} ?>>
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

      <button type="submit" name="update" class="btn btn-primary" value="<?php echo $row['User_ID'] ?>">Update</button>

  </form>
<?php } ?>
</div>
