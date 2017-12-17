<div class="container">
<?php

if(isset($_POST['update'])){
  $Status_ID=$_POST['update'];
  $Name=$_POST['Status_Name'];
  $sql = "UPDATE
    status
  SET
    Status_Name = '$Name'
  WHERE
    Status_ID = $Status_ID";
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['Delete'])){
    $Status_ID=$_POST['Delete'];
    $sql="DELETE FROM status WHERE Status_ID = ".$Status_ID;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['buttonUpdate'])){
  $id=$_POST['buttonUpdate'];
  include 'statusEdit.php';
}
else if(isset($_POST['buttonDelete'])){
  $id=$_POST['buttonDelete'];
  include 'statusDel.php';
}
else {
 ?>

  <table class="table">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>StatusName</th>
        <th>Status</th>
      </tr>
      <tbody>
        <form method="post">

          <?php
          $sql = "SELECT * FROM Status  ORDER BY Status_ID";
          $result = $connect->query($sql);
          $i = 1;
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["Status_Name"] ?></td>
              <td>
                <button type="submit" name="buttonUpdate" value="<?php echo $row["Status_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </button>
                <button type="submit" name="buttonDelete" value="<?php echo $row["Status_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-trash" aria-hidden="true"></span>
                </button>
              </td>
            </tr>
            <?php
          }
           ?>
           </form>
      </tbody>
    </thead>
  </table>

<?php } ?>
</div>
<style media="screen">
.edit{
  margin-bottom: 5px;
}
</style>
