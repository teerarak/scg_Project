<div class="container">
<?php

if(isset($_POST['update'])){
  $IPM_ID=$_POST['update'];
  $Name=$_POST['Choice_Name'];
  $sql = "UPDATE
    choice
  SET
    choice_Name = '$Name'
  WHERE
    choice_ID = $IPM_ID";
    // echo $sql;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['Delete'])){
    $choice_ID=$_POST['Delete'];
    $sql="DELETE FROM choice WHERE choice_ID = ".$choice_ID;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['buttonUpdate'])){
  $id=$_POST['buttonUpdate'];
  include 'choiceEdit.php';
}
else if(isset($_POST['buttonDelete'])){
  $id=$_POST['buttonDelete'];
  include 'choiceDel.php';
}
else {
 ?>

  <table class="table">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>Choice Name</th>
        <th>Status</th>
      </tr>
      <tbody>
        <form method="post">

          <?php
          $sql = "SELECT * FROM choice ORDER BY choice_ID";
          $result = $connect->query($sql);
          $i = 1;
          while($row = $result->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["Choice_Name"] ?></td>
              <td>
                <button type="submit" name="buttonUpdate" value="<?php echo $row["Choice_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </button>
                <button type="submit" name="buttonDelete" value="<?php echo $row["Choice_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
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
