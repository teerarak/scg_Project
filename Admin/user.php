<div class="container">
<?php

if(isset($_POST['update'])){
  $User_ID=$_POST['update'];
  $Name=$_POST['name'];
  $work_ID=$_POST['work_ID'];
  $Position=$_POST['Position'];
  $section=$_POST['section'];
  $cell=$_POST['cell'];
  $status=$_POST['status'];
  $sql = "UPDATE
    employee
  SET
    Name = '$Name',
    Work_ID = '$work_ID',
    Position = '$Position',
    section = '$section',
    cell = '$cell',
    Status = '$status'
  WHERE
    User_ID = $User_ID";
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['Delete'])){
    $User_ID=$_POST['Delete'];
    $sql="DELETE FROM employee WHERE User_ID = ".$User_ID;
    $connect->query($sql);
        echo'<div class="alert alert-success" role="alert">
              success
            </div>';
}
if(isset($_POST['buttonUpdate'])){
  $id=$_POST['buttonUpdate'];
  include 'userEdit.php';
}
else if(isset($_POST['buttonDelete'])){
  $id=$_POST['buttonDelete'];
  include 'userDel.php';
}
else {
 ?>

  <table class="table">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>Username</th>
        <th>Name</th>
        <th>Work_ID</th>
        <th>Position</th>
        <th>section</th>
        <th>Cell</th>
        <th>Status</th>
      </tr>
      <tbody>
        <form method="post">

          <?php
          $sql = "SELECT * FROM employee WHERE Status <> 'ADMIN' ORDER BY User_ID";
          $result = $connect->query($sql);
          $i = 1;
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row["Username"] ?></td>
              <td><?php echo $row["Name"] ?></td>
              <td><?php echo $row["Work_ID"] ?></td>
              <td><?php echo $row["Position"] ?></td>
              <td><?php echo $row["section"] ?></td>
              <td><?php echo $row["cell"] ?></td>
              <td><?php echo $row["Status"] ?></td>
              <td>
                <!--<a href="#myModal" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="'.$row['ID'].'" data-target="<?php echo $row['User_ID'] ?>">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </a>-->
                <button type="submit" name="buttonUpdate" value="<?php echo $row["User_ID"] ?>" class="btn edit" data-toggle="modal" data-target="#edit">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </button>
                <button type="submit" name="buttonDelete" value="<?php echo $row["User_ID"] ?>" class="btn" data-toggle="modal" data-target="#edit">
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
