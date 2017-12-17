<div class="container">
  <h3 class="text-center mt-3">แก้ไขข้อมูลเทคโนโลยี</h3>
  <?php

    $sql = "SELECT * FROM Teachnology WHERE Teachnology_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {

   ?>
  <form class="" method="post">
    <div class="form-group">
      <label for="Name">Technology Name</label>
      <input type="text" value=<?php echo $row['Teachnology_Name'] ?> class="form-control" name="Technology_Name" placeholder="name" required>
    </div>
    <button type="submit" name="update" class="btn btn-primary" value="<?php echo $row['Teachnology_ID'] ?>">Update</button>
  </form>
<?php } ?>
</div>
