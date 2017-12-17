<div class="container">
  <h3 class="text-center mt-3">แก้ไขข้อมูลสถานะ</h3>
  <?php

    $sql = "SELECT * FROM IPM WHERE IPM_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {

   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="Name">IPM name</label>
      <input type="text" value=<?php echo $row['IPM_Name'] ?> class="form-control" name="IPM_Name" placeholder="IPM name" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary" value="<?php echo $row['IPM_ID'] ?>">Update</button>
  </form>
<?php } ?>
</div>
