<div class="container">
  <h3 class="text-center mt-3">แก้ไขข้อมูลสถานะ</h3>
  <?php

    $sql = "SELECT * FROM Choice WHERE Choice_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {

   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="Name">Choice name</label>
      <input type="text" value=<?php echo $row['Choice_Name'] ?> class="form-control" name="Choice_Name" placeholder="Choice name" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary" value="<?php echo $row['Choice_ID'] ?>">Update</button>
  </form>
<?php } ?>
</div>
