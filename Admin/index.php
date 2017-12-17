
 <div class="container">

        <?php

          $sql_select_employee = ' SELECT * FROM employee WHERE User_ID = "'.$_SESSION['User_ID'].'" ';
          $query_employee = $connect->query($sql_select_employee);
          $result_employee = $query_employee->fetch_assoc();

          $sql_select_project = ' SELECT DISTINCT p.Project_ID,p.Project_name,p.Status_ID,p.Project_Date,s.status_name FROM project p
                                  JOIN status s ON s.Status_ID = p.Status_ID';
          $query_project = $connect->query($sql_select_project);
        ?>
      <div class="row">
  <div class="col-12 col-md-4" style="border:3px solid black;min-height:90vh;" >
    <div class="userpanel">
      <table class="table" >
        <tr class="">
          <td colspan="2" class="text-center profile">
            <img src="img/img_325791.png" width="100%" height="auto">
          </td>
        </tr>
        <tr>
          <td>รหัสพนักงาน</td>
          <td><?php echo $result_employee['User_ID']; ?></td>
        </tr>
        <tr>
          <td>ชื่อพนักงาน</td>
          <td><?php echo $result_employee['Name']; ?></td>
        </tr>
        <tr>
          <td>แผนก</td>
          <td><?php echo $result_employee['section']; ?></td>
        </tr>
        <tr>
          <td>ส่วน</td>
          <td><?php echo $result_employee['cell']; ?></td>
        </tr>
        <tr>
          <td>ตำแหน่ง</td>
          <td><?php echo $result_employee['Position']; ?></td>
        </tr>
        </table>
    </div>
      </div>
  <div class="col-12 col-md-8" style=style="border:3px solid black;min-height:90vh;">
    <table class="table table-bordered">
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
        <td><?php echo $Project_ID; ?></td>
        <td><?php echo $result_project['Project_name']; ?></td>
        <td><?php echo $result_project['status_name']; ?></td>
        <td>-</td>
        <td><?php echo substr($result_project['Project_Date'],0,10); ?></td>
        <td><a href="?Project_ID=<?php echo $Project_ID; ?>&menu=DetailProject" class="btn btn-primary">ดูข้อมูล</a></td>
      </tr>
       <?php } ?>
      </table>

          </div>
        </div>

 </div>
