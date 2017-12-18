<?php
   $id_project = $_GET['Project_ID'];
   $sql_select_result = ' SELECT * FROM result
                          INNER JOIN moc ON result.Choice_ID = moc.Choice_ID
                          INNER JOIN employee ON employee.User_ID = moc.MOC_Approve_ID
                          WHERE result.Project_ID = "'.$id_project.'"'.' AND moc.Project_ID = "'.$id_project.'" ';
   $query_select_result = $connect->query($sql_select_result);
  //  echo "$sql_select_result";
   $sql_select_project = ' SELECT * FROM project_detail WHERE Project_ID = "'.$id_project.'" ';
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
            $sql_detail = "SELECT * FROM project_detail WHERE Project_ID = '$id_project' ORDER BY Project_detail_ID DESC";
            // echo "$sql_detail";
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
                      $select_tech = "SELECT * FROM teachnology WHERE Teachnology_ID = '$Type_Project'";
                      $query_select_tech = $connect->query($select_tech);
                      $result_tech = $query_select_tech->fetch_assoc();
            ?>
                    <tr>
                      <td colspan="2"> <?php echo $result_tech['Teachnology_Name']; ?></td>
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
        $sql_select_approve = ' SELECT * FROM approve
        INNER JOIN employee ON employee.User_ID = approve.Approve_User_ID
        WHERE approve.Project_ID = "'.$id_project.'"'.' AND employee.Status != "MOC" ';
        $query_select_approve = $connect->query($sql_select_approve);

    ?>
        <table class="table">
            <?php
            $i = 0;
            $name_approver = [
              'ผู้อนุมัติเบื้องต้น',
              'ผู้อนุมัติในหลักการ',
              'ผู้อนุมัติPSSR'
            ];
             while ($result_select_approve = $query_select_approve->fetch_assoc()) {
                 $i++;
             ?>
            <tr>
                <td style="width:30%;"><?php echo $name_approver[$i-1]; ?> </td>

                <td><?php echo $result_select_approve['Name']; ?></td>
            </tr>
                <?php
             }
                ?>
        </table>
        <div class="comment">
          <table class="table">
            <tr>
              <th colspan="2" class="text-center"><h4>ความคิดเห็นของ MOC</h4></th>
            </tr>
            <tr>
              <th>ชื่อผู้อนุมัติ</th>
              <th>ความคิดเห็น</th>
              <td>อนุมัติ</td>
            </tr>
            <?php
              $sql_moc = "SELECT * FROM moc m
                          JOIN result r ON r.Choice_ID = m.Choice_ID
                          JOIN employee e ON m.MOC_Approve_ID = e.User_ID
                          WHERE r.Project_ID = '$id_project' AND m.Project_ID = '$id_project'";
              $query_moc = $connect->query($sql_moc);
              while ($result_moc = $query_moc->fetch_assoc()) {
             ?>
              <tr>
                <td><?php echo $result_moc['Name'] ?></td>
                <td>
                  <textarea name="name" class="form-control"rows="4" cols="40" readonly><?php echo $result_moc['MOC_Comment'] ?></textarea>
                </td>
                <td>
                  <?php if ($result_moc['Status_ID'] == 6): ?>
                      <h5 class="text-danger">ไม่อนุมัติ</h5>
                 <?php elseif ($result_moc['Status_ID'] > 3): ?>
                      <h5 class="text-success">อนุมัติแล้ว</h5>
                  <?php else: ?>
                      <h5 class="text-warning">ยังไม่อนุมัติ</h5>
                  <?php endif; ?>
                </td>
              </tr>
           <?php } ?>
              <tr>
                <th colspan="2" class="text-center"><h4>ความคิดเห็นของ Approve</h4></th>
              </tr>
           <?php
             $sql_moc = "SELECT * FROM approve a
                         JOIN employee e ON a.Approve_User_ID = e.User_ID
                         WHERE a.Project_ID = '$id_project'AND e.Status != 'MOC'";
                        //  echo "$sql_moc";
             $query_moc = $connect->query($sql_moc);
             while ($result_moc = $query_moc->fetch_assoc()) {
            ?>
             <tr>
               <td><?php echo $result_moc['Name'] ?></td>
               <td>
                 <textarea name="name" class="form-control"rows="4" cols="40" readonly><?php echo $result_moc['Approve_Comment'] ?></textarea>
               </td>
               <td>
                 <?php if ($result_moc['Status_ID'] == 6): ?>
                     <h5 class="text-danger">ไม่อนุมัติ</h5>
                <?php elseif ($result_moc['Status_ID'] == 8): ?>
                     <h5 class="text-success">อนุมัติแล้ว</h5>
                 <?php else: ?>
                     <h5 class="text-warning">ยังไม่อนุมัติ</h5>
                 <?php endif; ?>
               </td>
             </tr>
          <?php } ?>

          </table>
          <?php if ($result_project['Status_ID'] == 7): ?>
            <div class="Complete text-center mt-3 mb-4">
              <a href="?Project_ID=<?php echo $id_project; ?>&menu=updateStatus&Status=9"
                  class="btn btn-primary col-6">
                เสร็จสิ้นโครงการ
              </a>
            </div>
          <?php elseif ($result_project['Status_ID'] == 9): ?>
            <div class="Complete text-center mt-3 mb-4">
                <button type="button" class="btn btn-success col-6" name="Complete" disabled>Complete</button>
            </div>
          <?php endif; ?>

        </div>
    </div>
