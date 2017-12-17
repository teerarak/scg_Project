<div class="container">
        <h4 class="text-center">โครงการที่ต้องอนุมัติ</h4>
        <?php

          $sql_select_employee = ' SELECT * FROM employee WHERE User_ID = "'.$_SESSION['User_ID'].'" ';
          $query_employee = $connect->query($sql_select_employee);
          $result_employee = $query_employee->fetch_assoc();

          $sql_select_project = ' SELECT DISTINCT p.Project_ID,p.Project_name,p.Status_ID,p.Project_Date,s.status_name FROM project p
                                  JOIN result r ON p.Project_ID = r.Project_ID
                                  JOIN moc m ON r.Choice_ID  = m.Choice_ID
                                  JOIN status s ON s.Status_ID = p.Status_ID
                                  WHERE m.MOC_Approve_ID = "'.$_SESSION['User_ID'].'"'.
                                  ' AND m.Status_ID != "8" AND p.Status_ID = "3" ';
          $query_project = $connect->query($sql_select_project);
          // echo "$sql_select_project";
        ?>
      <div class="row">
        <div class="col-12 col-md-3" style="border:3px solid black;height:90vh;">
    <table class="table" >
      <tr>
        <td colspan="2" class="text-center">
          <img src="img/img_325791.png" width="150px" height="auto"alt="" w>
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
  <div class="col-12 col-md-9" style="border:3px solid black;height:90vh;"><br>
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
        <td><a href="?Project_ID=<?php echo $Project_ID; ?>&menu=Detail" class="btn btn-primary">ดูข้อมูล</a></td>
      </tr>
    <?php } ?>
    </table>

        </div>
      </div>

</div>
