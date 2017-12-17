<div class="container">
<?php

if(isset($_POST['update'])){
  $IPM_ID=$_POST['update'];
  $Name=$_POST['IPM_Name'];
  $sql = "UPDATE
    IPM
  SET
    IPM_Name = '$Name'
  WHERE
    IPM_ID = $IPM_ID";
    // echo $sql;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['Delete'])){
    $IPM_ID=$_POST['Delete'];
    $sql="DELETE FROM IPM WHERE IPM_ID = ".$IPM_ID;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['buttonUpdate'])){
  $id=$_POST['buttonUpdate'];
  include 'IPMEdit.php';
}
else if(isset($_POST['buttonDelete'])){
  $id=$_POST['buttonDelete'];
  include 'IPMDel.php';
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
          $sql = "SELECT * FROM IPM ORDER BY IPM_ID";
          $result = $connect->query($sql);
          $i = 1;
          while($row = $result->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["IPM_Name"] ?></td>
              <td>
                <button type="submit" name="buttonUpdate" value="<?php echo $row["IPM_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </button>
                <button type="submit" name="buttonDelete" value="<?php echo $row["IPM_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
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
