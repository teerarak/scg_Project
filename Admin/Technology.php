<div class="container">
<?php

if(isset($_POST['update'])){
  $Technology_ID=$_POST['update'];
  $Name=$_POST['Technology_Name'];
  $sql = "UPDATE
    Teachnology
  SET
    Teachnology_Name = '$Name'
  WHERE
    Teachnology_ID = $Technology_ID";
    // echo $sql;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['Delete'])){
    $Teachnology_ID=$_POST['Delete'];
    $sql="DELETE FROM Teachnology WHERE Teachnology_ID = ".$Teachnology_ID;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['buttonUpdate'])){
  $id=$_POST['buttonUpdate'];
  include 'technologyEdit.php';
}
else if(isset($_POST['buttonDelete'])){
  $id=$_POST['buttonDelete'];
  include 'technologyDel.php';
}
else {
 ?>

  <table class="table">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>Technology Name</th>
        <th>Status</th>
      </tr>
      <tbody>
        <form method="post">

          <?php
          $sql = "SELECT * FROM Teachnology ORDER BY Teachnology_ID";
          $result = $connect->query($sql);
          $i = 1;
          while($row = $result->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["Teachnology_Name"] ?></td>
              <td>
                <button type="submit" name="buttonUpdate" value="<?php echo $row["Teachnology_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </button>
                <button type="submit" name="buttonDelete" value="<?php echo $row["Teachnology_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
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
