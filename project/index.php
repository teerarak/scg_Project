
 <div class="container">

        <?php

          $sql_select_employee = ' SELECT * FROM employee WHERE User_ID = "'.$_SESSION['User_ID'].'" ';
          $query_employee = $connect->query($sql_select_employee);
          $result_employee = $query_employee->fetch_assoc();

          $sql_select_project = ' SELECT DISTINCT p.Project_ID,p.Project_name,p.Status_ID,p.Project_Date,s.status_name FROM project p
                                  JOIN status s ON s.Status_ID = p.Status_ID
                                  WHERE p.User_ID = "'.$_SESSION['User_ID'].'" ORDER BY p.Project_ID';
          $query_project = $connect->query($sql_select_project);
        ?>
      <div class="row">
  <div class="col-12 col-md-3" style="border:3px solid black;height:90vh;">
    <table class="table" >
      <tr>
        <td colspan="2" class="text-center">
          <img src="img/img_325791.png" width="150px" height="auto"alt="">
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
    <table class="table table-bordered" >
      <tr>
        <th><center>รหัสโครงการ</center></th>
        <th><center>ชื่อโครงการ</center></th>
        <th><center>สถานะโครงการ</center></th>
        <th><center>หมายเหตุ</center></th>
        <th><center>วันที่สร้างโครงการ</center></th>
        <th><center>แก้ไขโครงการ</center></th>
        <th><center>รายละเอียด</center></th>
        <th><center>ส่งโครงการ</center></th>
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
        <td class="text-center">
          <?php if ($result_project['Status_ID'] == 6 || $result_project['Status_ID'] == 1): ?>
            <a href="?Project_ID=<?php echo $Project_ID; ?>&menu=edit">
              <button  name="edit" class="btn edit" data-toggle="modal"  data-target="#edit">
                <span class="fa fa-pencil" aria-hidden="true"></span>
              </button>
            </a>
          <?php else: ?>
              <button  name="edit" class="btn edit" data-toggle="modal"  data-target="#edit" disabled>
                <span class="fa fa-pencil" aria-hidden="true"></span>
              </button>
          <?php endif; ?>


        </td>
        <td><a href="?Project_ID=<?php echo $Project_ID; ?>&menu=DetailProject" class="btn btn-primary">ดูข้อมูล</a></td>
        <td>
          <?php if($result_project['Status_ID'] == '1' || $result_project['Status_ID'] == '6') : ?>
            <a href="?menu=addproject&Project_ID=<?php echo $Project_ID; ?>"
              class="btn btn-primary">
              ส่งโครงการ
            </a>
          <?php else: ?>
            <!-- <a href="?menu=addproject&Project_ID=<?php echo $Project_ID;?>"></a> -->
            <button  name="" class="btn edit" data-toggle="modal"  data-target="#edit" disabled>
              ส่งโครงการ
            </button>
          <?php endif; ?>
        </td>
      </tr>
       <?php } ?>
      </table>
      <center><a href="?menu=Leader"><button class="btn btn-primary">สร้างโครงการ</button></a></center>

          </div>
        </div>

 </div>
