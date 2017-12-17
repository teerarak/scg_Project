<div class="container">
  <?php
    $sql = "SELECT * FROM choice WHERE choice_ID='$id'";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {
   ?>
  <form class="" method="post">
    <div class="row">
      <h3>คุณต้องการลบ <?php echo $row['Choice_Name'] ?> #<?php echo $id ?></h3>
    </div>

    <button type="submit" name="Delete" class="btn btn-primary" value="<?php echo $row['Choice_ID'] ?>">Delete</button>

  </form>
  <?php } ?>
  
</div>
