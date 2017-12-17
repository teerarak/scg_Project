<?php
    if(isset($_POST['Check_Status'])) {
      $dateNow = date('Y-m-d H:i:s');
      $id_project = $_POST['id'];
      $status_moc = $_POST['Check_Status'];
      $moc_id = $_POST['moc_id'];
      $comment = $_POST['comment'];
      $Approve_User_ID = $_POST['Approve_User_ID'];
      if ($status_moc == '6'){
        // //update Approve ให้เป็น 6
        // $sql_update_approve = 'UPDATE approve SET Status_ID = "6" WHERE Project_ID = "'.$id_project.'" ';
        // $result_update_approve = $connect->query($sql_update_approve);
        //update project
        $sql_update_project = 'UPDATE project SET Status_ID = "6" WHERE Project_ID = "'.$id_project.'" ';
        $result_update_project = $connect->query($sql_update_project);

        //update moc เป็น 6 ทั้งหมด
        $sql_update_status_moc = 'UPDATE moc SET Status_ID = "'.$status_moc.'" , Comment = "'.$comment.'" WHERE MOC_ID = "'.$moc_id.'" ';
        $result_update_status_moc = $connect->query($sql_update_status_moc);

      }
      else if ($status_moc == '3') {
      $sql_insert_approve = 'INSERT INTO
                            approve(Project_ID,Status_ID,Approve_User_ID,Approve_Comment,Approve_Date)
                            VALUES(\''.$id_project.'\',8,\''.$Approve_User_ID.'\',\''.$comment.'\',\''.$dateNow.'\')';

      $connect->query($sql_insert_approve);
      $sql_approve = "SELECT Approve_ID FROM APPROVE WHERE Project_ID = '$id_project' AND Approve_User_ID = $Approve_User_ID";
      $sql_query_approve = $connect->query($sql_approve);
      $result_approve = $sql_query_approve->fetch_assoc();
      $sql_update_status_moc = "UPDATE moc SET Status_ID = 8 ,Approve_ID = '".$result_approve['Approve_ID']."', MOC_Comment = '$comment' WHERE MOC_ID = '$moc_id' ";
      echo $sql_update_status_moc;
      if ($result_update_status_moc = $connect->query($sql_update_status_moc)){
          //อัพเดทถ้า ทุกคนเป็น 4
          $sql_update_project = "UPDATE project SET Status_ID = '3' WHERE Project_ID = $id_project";
          // echo "$sql_update_project";
          $result_update_project = $connect->query($sql_update_project);
          $sql_check_accept = ' SELECT * FROM result
          INNER JOIN moc ON result.Choice_ID = moc.Choice_ID
          WHERE result.Project_ID = "'.$id_project.'" ';
          // echo "$sql_check_accept";
          $query_check_accept = $connect->query($sql_check_accept);
          $count_accept = 0;
          while ( $result_check_accept = $query_check_accept->fetch_assoc() ) {
              if ($result_check_accept['Status_ID'] == '8') {
                $count_accept++;
              }
          }
          echo "$count_accept";
            if($count_accept == 7) {
              $sql_update_project = 'UPDATE project SET Status_ID = "4" WHERE Project_ID = "'.$id_project.'" ';
              $result_update_project = $connect->query($sql_update_project);
              // $sql_update_status_accept = ' SELECT * FROM result
              // INNER JOIN moc ON result.Choice_ID = moc.Choice_ID
              // WHERE result.Project_ID = "'.$id_project.'" ';
              // $query_update_status_accept = $connect->query($sql_update_status_accept);

              // while ($result_update_accept = $query_update_status_accept->fetch_assoc()){
              // $sql_update_status_moc_accept = 'UPDATE moc SET Status_ID = "4" WHERE MOC_ID = "'.$result_update_accept['MOC_ID'].'" ';
              // if ($result_update_status_moc_accept = $connect->query($sql_update_status_moc_accept)){
              // }
            }
          }
          header("Location:?menu=approveSuccess");
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
                            INNER JOIN moc ON result.Choice_ID = moc.Choice_ID
                            INNER JOIN choice ON moc.Choice_ID = choice.Choice_ID
                            INNER JOIN employee ON employee.User_ID = moc.MOC_Approve_ID
                            WHERE result.Project_ID = "'.$id_project.'" ';
   $query_select_result = $connect->query($sql_select_result);

   $sql_select_project = ' SELECT * FROM project_detail d
                           JOIN project p ON d.Project_ID = p.Project_ID
                           WHERE p.Project_ID = "'.$id_project.'" ';
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
            $sql_detail = "SELECT * FROM project_detail WHERE Project_ID = '$id_project' ORDER BY project_detail_ID DESC";
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
             <td><?php echo $result_project['Project_detail_Process']; ?></td>
           </tr>
           <tr>
             <th>เครื่องจักรที่ต้องการเปลี่ยน</th>
             <td><?php echo $result_project['Project_detail_Machine']; ?></td>
           </tr>
           <tr>
             <th>สถานที่เปลี่ยน</th>
             <td><?php echo $result_project['Project_detail_Place']; ?></td>
           </tr>
           <tr>
             <th>เหตุที่ขอในการเปลี่ยนแปลง</th>
             <td><?php echo $result_project['Project_detail_Reason']; ?></td>
           </tr>
           <tr>
             <th>วิธีการเปลี่ยนแปลง</th>
             <td><?php echo $result_project['Project_detail_Howto']; ?></td>
           </tr>
           <tr>
             <th>การประเมินความเสี่ยงและสิ่งแวดล้อม</th>
             <td><?php echo $result_project['Project_detail_Risk']; ?></td>
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
            <td><?php echo $result_select_result['Choice_Name']; ?></td>
            <td><?php echo $result_select_result['Result']; ?></td>
            <td><?php echo $result_select_result['Result_Benefit']; ?></td>
            <td><?php echo $result_select_result['Result_Effect']; ?></td>
            <td><?php echo $result_select_result['Result_Solution']; ?></td>
            <td><?php echo $result_select_result['Name']; ?> </td>

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
        $sql_select_approve = ' SELECT * FROM approve
        INNER JOIN employee ON employee.User_ID = approve.Approve_User_ID
        WHERE approve.Project_ID = "'.$id_project.'"'.' AND employee.Status != "MOC" ';
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
          $sql_sel_update_status = ' SELECT * FROM result
          INNER JOIN moc ON result.Choice_ID = moc.Choice_ID
          INNER JOIN employee ON employee.User_ID = moc.MOC_Approve_ID
          WHERE result.Project_ID = "'.$id_project.'" AND moc.MOC_Approve_ID = "'.$_SESSION['User_ID'].'" ';
          $query_update_status = $connect->query($sql_sel_update_status);
          $result_update_status = $query_update_status->fetch_assoc();
        ?>
        <table class="table">
        <form method="POST">
           <tr>
             <th>ชื่อ-นามสกุล</th>
             <th>แสดงความคิดเห็น</th>
             <th>อนุมัติ </th>
           </tr>
           <tr>
             <form method="POST">
               <th><?php echo $result_update_status['Name']; ?> </th>
             <td><textarea name="comment"  cols="15" rows="5" class="form-control"><?php echo $result_update_status['Comment']; ?></textarea></td>
             <td>
               <?php if ($result_update_status['Status_ID'] == '3'): ?>
                 <button name="Check_Status" value="3"  class="btn btn-success" onclick="approve()">อนุมัติ</button> <button name="Check_Status" value="6" onclick="reject()" class="btn btn-danger">ไม่อนุมัติ</button>
               <?php elseif ($result_update_status['Status_ID'] == '4'): ?>
                 <button name="Check_Status" value="4" class="btn btn-success" disabled>อนุมัติแล้ว</button>
               <?php elseif ($result_update_status['Status_ID'] == '6'): ?>
                 <button class="btn btn-danger" disabled>ไม่อนุมัติ</button>
               <?php elseif ($result_update_status['Status_ID'] == '5'): ?>
                 <button class="btn btn-success" disabled>ผ่านแล้ว</button>
               <?php endif; ?>
             </td>
             <input type="hidden" name="id" value="<?php echo $id_project; ?>">
             <input type="hidden" name="moc_id" value="<?php echo $result_update_status['MOC_ID']; ?>">
             <input type="hidden" name="Approve_User_ID" value="<?php echo $result_update_status['MOC_Approve_ID']; ?>">
             </form>
           </tr>
      </table>
    </div>

    <script>
      // function approve() {
      //     confirm("คุณต้องการอนุมัติเอกสารนี้หรือไหม่!");
      // }
      // function reject() {
      //     confirm("คุณต้องการยกเลิกเอกสารนี้หรือไหม่!");
      // }
    </script>
