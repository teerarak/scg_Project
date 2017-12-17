<div class="container">
  <?php
    $sql = "SELECT * FROM status WHERE status_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {
   ?>
  <form class="" method="post">
    <div class="row">
      <h3>คุณต้องการลบ <?php echo $row['Status_Name'] ?> #<?php echo $id ?></h3>
    </div>

    <button type="submit" name="Delete" class="btn btn-primary" value="<?php echo $row['Status_ID'] ?>">Delete</button>

  </form>
  <?php } ?>

</div>
