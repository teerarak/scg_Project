<?php
    if(isset($_POST['Check_Status'])) {
      $id_project = $_POST['id'];
      $status_approve = $_POST['Check_Status'];
      $approve_id = $_POST['approve_id'];
      $comment = $_POST['comment'];
      if ($status_approve == '6'){
        // //update Approve ให้เป็น 6
        $sql_update_approve = 'UPDATE approve SET Status_ID = "6" WHERE Project_ID = "'.$id_project.'" AND Approve_User_ID = "'.$_SESSION['User_ID'].'"';
        $result_update_approve = $connect->query($sql_update_approve);
        //update project
        $sql_update_project = 'UPDATE project SET Status_ID = "6" WHERE Project_ID = "'.$id_project.'"';
        $result_update_project = $connect->query($sql_update_project);
      }
      else if ($status_approve == '4'){
        // //update Approve คนแรก
        $sql_update_approve = 'UPDATE approve SET Status_ID = "7",Comment = "'.$comment.'" WHERE Project_ID = "'.$id_project.'" AND Approve_User_ID = "'.$_SESSION['User_ID'].'"';
        $result_update_approve = $connect->query($sql_update_approve);
        //update project
        $sql_update_project = 'UPDATE project SET Status_ID = "4" WHERE Project_ID = "'.$id_project.'"';
        $result_update_project = $connect->query($sql_update_project);
      }
      else if ($status_approve == '7') {
        $sql_update_approve = 'UPDATE approve SET Status_ID = "7",Comment = "'.$comment.'" WHERE Project_ID = "'.$id_project.'" AND Approve_User_ID = "'.$_SESSION['User_ID'].'"';
      if ($result_update_approve = $connect->query($sql_update_approve)){
          //อัพเดทถ้า ทุกคนเป็น 7
          $sql_check_accept = ' SELECT * FROM approve
                                WHERE Project_ID = "'.$id_project.'" ';
          $query_check_accept = $connect->query($sql_check_accept);
          $count_accept = 0;
          while ( $result_check_accept = $query_check_accept->fetch_assoc() ) {
              if ($result_check_accept['Status_ID'] == '7') {
                $count_accept++;
              }
          }
            if($count_accept == 3) {
              $sql_update_project = 'UPDATE project SET Status_ID = "7" WHERE Project_ID = "'.$id_project.'" ';
              $result_update_project = $connect->query($sql_update_project);
              $sql_update_status_accept = ' SELECT * FROM result
              INNER JOIN moc ON result.result_ID = moc.Result_ID
              WHERE result.Project_ID = "'.$id_project.'" ';
              $query_update_status_accept = $connect->query($sql_update_status_accept);

              while ($result_update_accept = $query_update_status_accept->fetch_assoc()){
              $sql_update_status_moc_accept = 'UPDATE moc SET Status_ID = "8" WHERE MOC_ID = "'.$result_update_accept['MOC_ID'].'" ';
              if ($result_update_status_moc_accept = $connect->query($sql_update_status_moc_accept)){
              }
            }

          }
        }
      }
    }

  if(isset($id_project)){
   $id_project = $_GET['Project_ID'];
  }
  else if (isset($_GET['Project_ID'])) {
    $id_project = $_GET['Project_ID'];
  }

   $sql_select_result = ' SELECT * FROM result
                          INNER JOIN moc ON result.result_ID = moc.Result_ID
                          INNER JOIN choice ON moc.Choice_ID = choice.Choice_ID
                          INNER JOIN employee ON employee.User_ID = moc.MOC_Approve_ID
                          WHERE result.Project_ID = "'.$id_project.'" ';
   $query_select_result = $connect->query($sql_select_result);

   $sql_select_project = ' SELECT * FROM project WHERE Project_ID = "'.$id_project.'" ';
   $query_select_project = $connect->query($sql_select_project);
   $result_project = $query_select_project->fetch_assoc();

 ?>
    <div class="container" style="border:3px solid black;">
        <table class="table table-bordered mt-4">
        <tr>
          <th colspan="2"><h2 class="text-center">โครงการ <?php echo $result_project['Project_name']; ?></h2></th>
        </tr>
        <tr>
          <th colspan="2">
            <div class="row text-center">
              <div class="col ">
                วันที่เริ่มโครงการ <?php echo substr($result_project['Project_Startdate'],0,10); ?>
              </div>
              <div class="col">
                วันที่สิ้นสุดโครงการ <?php echo substr($result_project['Project_Enddate'],0,10); ?>
              </div>
            </div>
          </th>
        </tr>
        <tr>
          <th colspan="2" class="text-center"><h2>ส่วนที่ 1</h2></th>
        </tr>
          <?php
            $sql_detail = "SELECT * FROM project_detail WHERE Project_ID = '$id_project' ORDER BY Detail_ID DESC";
            $query_select_detail = $connect->query($sql_detail);
            $i = 0;
            while($result_detail = $query_select_detail->fetch_assoc()){
              $Type_Project = $result_detail['Type_Project'];
            ?>
              <?php if ($i == 0): ?>
                  <tr>
                      <th colspan="2" class="text-center">
                        <h4>
                        <?php
                          if (substr($Type_Project,0,1) == 'I') {
                            echo "ติดตั้งเครื่องจักรใหม่ (New Project)";
                          } elseif (substr($Type_Project,0,1) == 'T') {
                            echo "การเปลี่ยนแปลงเทคโนโลยี (Change in Technolgy)";
                          } elseif (substr($Type_Project,0,1) == 'F') {
                            echo "การเปลี่ยนแปลงสิ่งอำนวยความสะดวก (Change in Facilities)";
                          }
                         ?>
                       </h4>
                      </th>
                    </th>
                  </tr>
              <?php endif; ?>
              <?php if (substr($Type_Project,0,1) == 'I'):
                      $select_ipm = "SELECT * FROM IPM WHERE IPM_ID = '$Type_Project'";
                      $query_select_ipm= $connect->query($select_ipm);
                      $result_ipm = $query_select_ipm->fetch_assoc();
              ?>
                  <tr>
                    <td colspan="2"><?php echo $result_ipm['IPM_name']; ?></td>
                  </tr>
            <?php elseif (substr($Type_Project,0,1) == 'T'):
                      $select_tech = "SELECT * FROM technology WHERE Technology_ID = '$Type_Project'";
                      $query_select_tech = $connect->query($select_tech);
                      $result_tech = $query_select_tech->fetch_assoc();
            ?>
                    <tr>
                      <td colspan="2"> <?php echo $result_tech['Technology_Name']; ?></td>
                    </tr>
            <?php elseif (substr($Type_Project,0,1) == 'F'):
                        $select_fac = "SELECT * FROM facilities WHERE Facilities_ID = '$Type_Project'";
                        $query_select_fac= $connect->query($select_fac);
                        $result_fac = $query_select_fac->fetch_assoc();
            ?>
                      <tr>
                        <td colspan="2"> <?php echo $result_fac['Facilities_name']; ?></td>
                      </tr>
            <?php else: ?>
                      <tr>
                        <td colspan="2">อื่นๆ : <?php echo $Type_Project; ?></td>
                      </tr>
            <?php endif; ?>
            <?php
              $i++;
            }
           ?>

        <tr>
          <th style="width:30%;">Process ที่ต้องการเปลี่ยน</th>
          <td><?php echo $result_project['Project_Process']; ?></td>
        </tr>
        <tr>
          <th>เครื่องจักรที่ต้องการเปลี่ยน</th>
          <td><?php echo $result_project['Project_Machine']; ?></td>
        </tr>
        <tr>
          <th>สถานที่เปลี่ยน</th>
          <td><?php echo $result_project['Project_Place']; ?></td>
        </tr>
        <tr>
          <th>เหตุที่ขอในการเปลี่ยนแปลง</th>
          <td><?php echo $result_project['Project_Reason']; ?></td>
        </tr>
        <tr>
          <th>วิธีการเปลี่ยนแปลง</th>
          <td><?php echo $result_project['Project_Howto']; ?></td>
        </tr>
        <tr>
          <th>การประเมินความเสี่ยงและสิ่งแวดล้อม</th>
          <td><?php echo $result_project['Project_Risk']; ?></td>
        </tr>

        </table>
    <table class="table">
        <tr>
            <th>หัวข้อพิจารณา</th>
            <th>ผลลัพธ์</th>
            <th>ประโยชน์จากการเปลี่ยนแปลง</th>
            <th>ผลกระทบจากการเปลี่ยนแปลง</th>
            <th>แนวทางการแก้ไข/ป้องกัน (เอกสารแนบ)</th>
            <th>ผู้พิจารณา</th>
        </tr>
        <?php while ($result_select_result = $query_select_result->fetch_assoc()) {
                $file = $result_select_result['Result_File'];
        ?>
        <tr>
            <td><?php echo $result_select_result['choice_name']; ?></td>
            <td><?php echo $result_select_result['Result']; ?></td>
            <td><?php echo $result_select_result['Result_Benefit']; ?></td>
            <td><?php echo $result_select_result['Result_Effect']; ?></td>
            <td><?php echo $result_select_result['Result_Solution']; ?></td>
            <td><?php echo $result_select_result['Name']; ?></td>

        </tr>
        <?php } ?>
        <tr>
          <td>เอกสารแนบ</td>
          <td colspan="5">
              <a href="<?php echo $file; ?>" target="_blank">เปิดเอกสาร</a>
          </td>
        </tr>
    </table>

    <?php
        $sql_select_approve = ' SELECT * FROM approve INNER JOIN employee ON employee.User_ID = approve.Approve_User_ID  WHERE approve.Project_ID = "'.$id_project.'" ';
        $query_select_approve = $connect->query($sql_select_approve);

    ?>
        <table class="table">
            <?php
            $i = 0;
             while ($result_select_approve = $query_select_approve->fetch_assoc()) {
                 $i++;
             ?>
            <tr>
                <td style="width:30%;">ผู้อนุมัติโครงการคนที่ <?php echo $i; ?> </td>

                <td><?php echo $result_select_approve['Name']; ?></td>
            </tr>
                <?php
             }
                ?>
        </table>
        <?php
          $sql_select_approve = ' SELECT * FROM approve INNER JOIN employee ON employee.User_ID = approve.Approve_User_ID
                                  WHERE approve.Project_ID = "'.$id_project.'" AND Approve_User_ID = "'.$_SESSION['User_ID'].'" ';
          $query_select_approve = $connect->query($sql_select_approve);
          $result_update_approve = $query_select_approve->fetch_assoc();
        ?>
        <table class="table">
        <form method="POST">
           <tr>
             <th>ชื่อ-นามสกุล</th>
             <th>แสดงความคิดเห็น</th>
             <th>อนุมัติ</th>
           </tr>
           <tr>
             <form method="POST">
               <th><?php echo $result_update_approve['Name']; ?> </th>
             <td><textarea name="comment"  cols="15" rows="5" class="form-control"><?php echo $result_update_approve['Comment']; ?></textarea></td>
             <td>
               <?php if ($result_update_approve['Status_ID'] == '5'): ?>
                 <button name="Check_Status" value="7" class="btn btn-success">อนุมัติ</button> <button name="Check_Status" value="6" class="btn btn-danger">ไม่อนุมัติ</button>
               <?php elseif ($result_update_approve['Status_ID'] == '1'): ?>
                <button name="Check_Status" value="4" class="btn btn-success">อนุมัติ</button> <button name="Check_Status" value="6" class="btn btn-danger">ไม่อนุมัติ</button>
               <?php elseif ($result_update_approve['Status_ID'] == '7'): ?>
                 <button name="Check_Status" class="btn btn-success" disabled>อนุมัติแล้ว</button>
               <?php elseif ($result_update_approve['Status_ID'] == '6'): ?>
                 <button class="btn btn-danger" disabled>ไม่อนุมัติ</button>
               <?php elseif ($result_update_approve['Status_ID'] == '8'): ?>
                 <button class="btn btn-success" disabled>ผ่านแล้ว</button>
               <?php endif; ?>
             </td>
             <input type="hidden" name="id" value="<?php echo $id_project; ?>">
             <input type="hidden" name="aprrove_id" value="<?php echo $result_update_approve['Approve_ID']; ?>">
             </form>
           </tr>
      </table>
    </div>
