
    <div class="container" style="border:3px solid black;">
    <?php
      $Project_ID = $_GET['Project_ID'];
      $start_project = ['คุณภาพ','การบำรุงรักษา','กระบวนการ','ความปลอดภัย','สิ่งแวดล้อม','กฏหมาย','ชุมชน'];
     if (isset($_POST['addresult'])) {
        $project_name = $_POST['project_name'];
        $benefit = $_POST['benefit'];
        $effect = $_POST['effect'];
        $modify = $_POST['modify'];
        $select_user = $_POST['select_user'];
        $select_approve = $_POST['select_approve'];

        // for ($x = 0; $x<7; $x++) {
        //   $target_dir = "file/";
        //   $randomfile = 1;
        //   $insert_picture[$x] = "file/";
        //   $randomfile = rand(1,999999);
        //   $target_file = $target_dir.$randomfile.$_FILES["fileToUpload$x"]["name"];
        //   if ($_FILES["fileToUpload$x"]["name"] != '') {
        //     $insert_picture[$x] = $insert_picture[$x].$randomfile.$_FILES["fileToUpload$x"]["name"];
        //     copy($_FILES["fileToUpload$x"]['tmp_name'], $target_file);
        //   } else {
        //     $insert_picture[$x] = '';
        //   }
        // }
        $dateResult = date("Y-m-d H:i:s");
          for ($i = 0; $i<7 ; $i++){
            $Choice_ID = $i+1;
            $result[$i] = $_POST["result$i"];
            $sql_insert_moc = ' INSERT INTO result (
              Result,
              Result_Benefit,
              Result_Effect,
              Result_Solution,
              Result_Date,
              Choice_ID,
              Project_ID
            ) VALUES (
              "'.$result[$i].'",
              "'.$benefit[$i].'",
              "'.$effect[$i].'",
              "'.$modify[$i].'",
              "'.$dateResult.'",
              "'.$Choice_ID.'",
              "'.$Project_ID.'"
            ) ';
//
            if ($query_insert_moc = $connect->query($sql_insert_moc)) {
               $sql_select_result = 'SELECT * FROM result WHERE Project_ID = "'.$Project_ID.'" ';
               $query_select_result = $connect->query($sql_select_result);
               $select_result = $query_select_result->fetch_assoc();
               $result_ID = $select_result['result_ID'];
                 //for ถ้าต้องการเก็บ 7 รอบ
                $sql_insert_table_moc = " INSERT INTO moc (
                  MOC_Approve_ID,
                  Choice_ID,
                  Status_ID,
                  Project_ID
                ) VALUES (
                  '".$select_user[$i]."',
                  '".($i+1)."',
                  '3',
                  '".$Project_ID."'
                )";
                $connect->query($sql_insert_table_moc);
                $result_ID++;
            }
          }
        for ($i=0; $i < 3 ; $i++) {
          if ($i == 0) {
            $approve = "INSERT INTO approve (Approve_User_ID,Project_ID,Status_ID) VALUES ('".$select_approve[$i]."','$Project_ID','2')";
            $connect->query($approve);
          }
          else if ($i == 1) {
            $approve = "INSERT INTO approve (Approve_User_ID,Project_ID,Status_ID) VALUES ('".$select_approve[$i]."','$Project_ID','4')";
            $connect->query($approve);
          }
          else {
            $approve = "INSERT INTO approve (Approve_User_ID,Project_ID,Status_ID) VALUES ('".$select_approve[$i]."','$Project_ID','7')";
            $connect->query($approve);
          }
        }
        $update = "UPDATE PROJECT set Status_ID = '2' WHERE Project_ID = '$Project_ID'";
        $connect->query($update);
        header('Location:?menu=complete');
     }

    ?>

    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="project_name" value=<?php echo $Project_ID; ?>>
    <table class="table">
       <tr>
         <th>หัวข้อพิจารณา</th>
         <th>มีผล</th>
         <th>ไม่มีผล</th>
         <th>ประโยชน์จากการเปลี่ยนแปลง</th>
         <th>ผลกระทบจากการเปลี่ยนแปลง</th>
         <th>แนวทางการแก้ไขป้องกัน (เอกสารแนบ)</th>
         <th>ผู้พิจารณา</th>
       <tr>
        <?php
        for ($i = 0; $i< count($start_project) ; $i++) {
        ?>
        <tr>
        <td><?php echo $start_project[$i]; ?></td>
        <td><input type="radio" name="result<?php echo $i; ?>" value="มีผล"  class="form-control" required onclick="Set('<?php echo $i ?>')"></td>
        <td><input type="radio" name="result<?php echo $i; ?>" value="ไม่มีผล" class="form-control" required onclick="notSet('<?php echo $i ?>')"></td>
        <td><input type="text" name="benefit[]" id="notb<?php echo $i ?>" class="form-control" ></td>
        <td><input type="text" name="effect[]" id="note<?php echo $i ?>" class="form-control" ></td>
        <td><input type="text" name="modify[]" id="notm<?php echo $i ?>" class="form-control" ></td>
        <td>
        <select class="form-control" name="select_user[]"required>
          <option value="" disabled selected>เลือก MOC</option>
             <?php
             $select_moc = 'SELECT * FROM employee WHERE Status = "MOC" ';
             $query_select_moc = $connect->query($select_moc);
             while ($result_moc = $query_select_moc->fetch_assoc()) {
             ?>
              <?php if ($i == 0): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>" ><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 1): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 2): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 3): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 4): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 5): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php elseif ($i == 6): ?>
                  <option value="<?php echo $result_moc['User_ID']; ?>"><?php echo $result_moc['Name']; ?></option>
              <?php endif; ?>
             <?php } ?>
        </select>

        </td>
        </tr>
        <!-- <tr>
          <td colspan="3">อัพโหลดไฟล์</td>
          <td ><input type="file" name="fileToUpload<?php echo $i; ?>" id="fileToUpload<?php echo $i; ?>" class="form-control" ></td>
        </tr> -->
        <?php
          }
        ?>
        <?php
        $name_approver = [
          'ผู้อนุมัติเบื้องต้น',
          'ผู้อนุมัติในหลักการ',
          'ผู้อนุมัติPSSR'
        ];
         ?>
        <?php for ($i = 0; $i < 3 ; $i++): ?>
          <tr>
            <?php
              $select_app = 'SELECT * FROM employee WHERE Status = "Approve" OR Status = "Manager"';
              $query_select_app = $connect->query($select_app);
             ?>
            <td colspan="3"><?php echo $name_approver[$i] ?> : </td>
            <td colspan="4">
              <select name="select_approve[]" required class="form-control">
                <option value="" disabled selected>เลือกผู้อนุมัติโครงการ</option>
              <?php
                  while ($result_app = $query_select_app->fetch_assoc()) {
                 ?>
                    <option value="<?php echo $result_app['User_ID']; ?>"><?php echo $result_app['Name']; ?></option>
               <?php
                  }
                ?>
            </td>
          </tr>
        <?php endfor; ?>
         <td colspan="7"><center><button class="btn btn-primary" name="addresult">ส่งหัวข้อ</button></center></td>
       </tr>
    </table>
    </form>

    </div>
<script type="text/javascript">
  function notSet(i) {
    document.getElementById("notb"+i).readOnly = true;
    document.getElementById("note"+i).readOnly = true;
    document.getElementById("notm"+i).readOnly = true;
    document.getElementById("fileToUpload"+i).readOnly = true;
  }
  function Set(i) {
    document.getElementById("notb"+i).readOnly = false;
    document.getElementById("note"+i).readOnly = false;
    document.getElementById("notm"+i).readOnly = false;
    document.getElementById("fileToUpload"+i).readOnly = false;
  }
</script>
