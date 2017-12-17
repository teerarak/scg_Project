

 <div class="container">

    <form method="GET" class="text-center">
    <select name="select_ID" id="select_table" class="form-control">
      <option value="1">Draft</option>
      <option value="2">รอพิจารณาขอบเขต</option>
      <option value="3">รอพิจารณาเบื้องต้น</option>
      <option value="4">รอพิจารณาโดย MOC Expert</option>
      <option value="5">รอพิจารณาอนุมัติในหลักการ</option>
      <option value="6">Denied</option>
      <option value="7">On Progress</option>
      <option value="8">รออนุมัติ PSSR</option>
      <option value="9">Completed</option>
    </select>
    <br>
    <input type="hidden" name="menu" value="Table">
    <button class="btn btn-primary col-3">ค้นหา</button>
    </form>
    <?php
    if (isset($_GET['select_ID'])) {
    $status_ID = $_GET['select_ID'];
    //   $sql_select_project = ' SELECT DISTINCT p.Project_ID,p.Project_name,p.Status_ID,p.Project_Startdate,s.status_name FROM project p
    //                           JOIN status s ON s.Status_ID = p.Status_ID WHERE';
    $sql_select_project = ' SELECT * FROM project INNER JOIN status ON project.Status_ID = status.status_ID WHERE project.Status_ID = "'.$status_ID.'" ';
    $query_project = $connect->query($sql_select_project);

    $sql_select_status = ' SELECT * FROM status WHERE status_ID = "'.$status_ID.'" ';
    $query_select_status = $connect->query($sql_select_status);
    $result_select_status = $query_select_status->fetch_assoc();
    ?>
  <div class="row mt-4">
<div class="col-12 col-md-12" style="border:3px solid black;height:90vh;">
<table class="table table-bordered mt-4">
    <tr>
        <th colspan="6">
        <?php echo $result_select_status['status_name'];  ?>
        </th>
    </tr>
  <tr>
    <th>รหัสโครงการ</th>
    <th>ชื่อโครงการ</th>
    <th>สถานะโครงการ</th>
    <th>หมายเหตุ</th>
    <th>วันที่สร้างโครงการ</th>
    <th>รายละเอียด</th>
  </tr>
   <?php
      while ($result_project = $query_project->fetch_assoc()) {
        $Project_ID = $result_project['Project_ID'];
    ?>
  <tr>
    <td><?php echo $result_project['Project_ID']; ?></td>
    <td><?php echo $result_project['Project_name']; ?></td>
    <td><?php echo $result_project['status_name']; ?></td>
    <td>-</td>
    <td><?php echo substr($result_project['Project_Startdate'],0,10); ?></td>
    <td><a href="?Project_ID=<?php echo $result_project['Project_ID']; ?>&menu=Detail" class="btn btn-primary">ดูข้อมูล</a></td>
  </tr>
   <?php } ?>
  </table>

      </div>
    </div>
    <?php } ?>

 </div>
