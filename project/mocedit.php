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
    $insert_picture=array();
    for ($x = 0; $x<7&&isset($_FILES["fileToUpload$x"]); $x++) {
      $target_dir = "file/";
      $randomfile = 1;
      $insert_picture[$x] = "file/";
      $randomfile = rand(1,999999);
      $target_file = $target_dir.$randomfile.$_FILES["fileToUpload$x"]["name"];
      if ($_FILES["fileToUpload$x"]["name"] != '') {
        $insert_picture[$x] = $insert_picture[$x].$randomfile.$_FILES["fileToUpload$x"]["name"];
        copy($_FILES["fileToUpload$x"]['tmp_name'], $target_file);
      } else {
        $insert_picture[$x] = '';
      }
    }
    $sql_select_result = 'SELECT * FROM result WHERE Project_ID = "'.$Project_ID.'" ';
    $query_select_result = $connect->query($sql_select_result);
    $select_result = $query_select_result->fetch_assoc();
    $result_ID = $select_result['result_ID'];
      for ($i = 0; $i<7 ; $i++){
        $result[$i] = $_POST["result$i"];
        if(isset($insert_picture[$i])){
          $sql_insert_moc = 'UPDATE result SET Result="'.$result[$i].'",Result_Benefit="'.$benefit[$i].'",Result_Effect="'.$effect[$i].'",Result_Solution="'.$modify[$i].'",Result_File="'.$insert_picture[$i].'" WHERE result_ID='.($result_ID).' AND Project_ID='.$Project_ID;
        }else{
          $sql_insert_moc = 'UPDATE result SET Result="'.$result[$i].'",Result_Benefit="'.$benefit[$i].'",Result_Effect="'.$effect[$i].'",Result_Solution="'.$modify[$i].'" WHERE result_ID='.($result_ID).' AND Project_ID='.$Project_ID;
        }
        if ($query_insert_moc = $connect->query($sql_insert_moc)) {
             //for ถ้าต้องการเก็บ 7 รอบ
            $sql_insert_table_moc = "UPDATE moc SET MOC_Approve_ID='".$select_user[$i]."',Choice_ID='".($i+1)."' WHERE MOC_ID=".($result_ID);
            $connect->query($sql_insert_table_moc);
            $result_ID++;
        }
      }
      $delete = "DELETE FROM approve WHERE Project_ID = ".$Project_ID;
      $connect->query($delete);
    for ($i=0; $i < 3 ; $i++) {
      if ($i == 0) {
        $approve = "INSERT INTO approve (Approve_User_ID,Project_ID,Status_ID) VALUES ('".$select_approve[$i]."','$Project_ID','1')";
        $connect->query($approve);
      }
      else {
        $approve = "INSERT INTO approve (Approve_User_ID,Project_ID,Status_ID) VALUES ('".$select_approve[$i]."','$Project_ID','3')";
        $connect->query($approve);
      }
    }
    header('Location:?menu=complete');
 }


?>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="project_name" value=<?php echo $Project_ID ?>>
<table class="table">
   <tr>
     <th>หัวข้อพิจารณา</th>
     <th>มีผล</th>
     <th>ไม่มีผล</th>
     <th>ประโยชน์จากการเปลี่ยนแปลง</th>
     <th>ผลกระทบจากการเปลี่ยนแปลง</th>
     <th>แนวทางการแก้ไขป้องกัน (เอกสารแนบ)</th>
     <th>ผู้พิจารณา</th>
   </tr>

    <?php
    $sql = "SELECT * FROM result WHERE Project_ID=".$Project_ID;
    $qurey = $connect->query($sql);
    for ($i = 0; $i< count($start_project) ; $i++) {
      $result = $qurey->fetch_array();
    ?>
    <tr>
    <td><?php echo $start_project[$i]; ?></td>
    <td><input type="radio" name="result<?php echo $i; ?>" value="มีผล" class="form-control" required onclick="Set('<?php echo $i ?>')" <?php if($result['Result']=='มีผล')echo 'checked'; ?>></td>
    <td><input type="radio" name="result<?php echo $i; ?>" value="ไม่มีผล" class="form-control" required onclick="notSet('<?php echo $i ?>')" <?php if($result['Result']=='ไม่มีผล')echo 'checked'; ?>></td>
    <td><input type="text" name="benefit[]" id="notb<?php echo $i ?>" value="<?php echo $result['Result_Benefit'] ?>" class="form-control" required <?php if($result['Result']=='ไม่มีผล')echo 'readonly'; ?>></td>
    <td><input type="text" name="effect[]" id="note<?php echo $i ?>" value="<?php echo $result['Result_Effect'] ?>" class="form-control" required <?php if($result['Result']=='ไม่มีผล')echo 'readonly'; ?>></td>
    <td><input type="text" name="modify[]" id="notm<?php echo $i ?>" value="<?php echo $result['Result_Solution'] ?>" class="form-control" required <?php if($result['Result']=='ไม่มีผล')echo 'readonly'; ?>></td>
    <td>
      <?php
      $sql_moc="SELECT MOC_Approve_ID FROM moc WHERE MOC_ID=".$result['result_ID'];
      $query_moc = $connect->query($sql_moc);
       ?>
    <select class="form-control" name="select_user[]"required>
      <option value="" disabled>เลือก MOC</option>
         <?php
         $select_moc = 'SELECT * FROM employee WHERE Status = "MOC" ';
         $query_select_moc = $connect->query($select_moc);
         $result_moc_select = $query_moc->fetch_array();
         while ($result_moc = $query_select_moc->fetch_assoc()) {

           echo $result_moc_select['MOC_Approve_ID']."-".$result_moc['User_ID'];
         ?>
          <?php if ($i == 0): ?>
            <?php if ($result_moc['Name'] == 'ฐานวัฒน์ อัศวโชคอนันท์'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 1): ?>
            <?php if ($result_moc['Name'] == 'บัณฑูร ฝึกความดี' || $result_moc['Name'] == 'ชวลิต นันทไตรทิพย์' ): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 2): ?>
            <?php if ($result_moc['Name'] == 'เกรียงศักดิ์ ฉุนชื่นจิตต์' || $result_moc['Name'] == 'เอกชัย งามพิทักษ์จิตต์'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 3): ?>
            <?php if ($result_moc['Name'] == 'รุ่งโรจน์ พูลพานิชอุปถัมย์'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 4): ?>
            <?php if ($result_moc['Name'] == 'จุฑามาศ จิตต์ชื่น'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 5): ?>
            <?php if ($result_moc['Name'] == 'ประทีป โยปินตา'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php elseif ($i == 6): ?>
            <?php if ($result_moc['Name'] == 'ภานุวัฒน์  คำใสย'): ?>
              <option value="<?php echo $result_moc['User_ID']; ?>" <?php if($result_moc_select['MOC_Approve_ID']==$result_moc['User_ID'])echo 'selected' ?>><?php echo $result_moc['Name']; ?></option>
            <?php endif; ?>
          <?php endif; ?>
         <?php } ?>
    </select>

    </td>
    </tr>
    <tr>
      <td colspan="3">อัพโหลดไฟล์</td>
      <td><input type="text" name="" value="<?php echo $result['Result_File'] ?>" style="border:0px;" readonly></td>
      <td> <input type="file" name="fileToUpload<?php echo $i; ?>" id="fileToUpload<?php echo $i; ?>" class="form-control" <?php if($result['Result']=='ไม่มีผล')echo 'disabled'; ?>></td>
    </tr>
    <?php
      }
    ?>
    <?php for ($i = 0; $i < 3 ; $i++): ?>
      <tr>
        <?php
          $select_app = 'SELECT * FROM employee WHERE Status = "Approve" ';
          $query_select_app = $connect->query($select_app);
          $sql_moc="SELECT Approve_User_ID FROM approve WHERE Project_ID=".$result['Project_ID'];
          $query_moc = $connect->query($sql_moc);
          $check=array();
          $top=0;
          while ($result_moc = $query_moc->fetch_assoc()) {
            $check[$top++]=$result_moc['Approve_User_ID'];
          }
         ?>
        <td colspan="3">ผู้อนุมัติโครงการคนที่ <?php echo ($i+1); ?> : </td>
        <td colspan="4">
          <select name="select_approve[]" class="form-control" required>
            <option value="" disabled <?php if(!isset($check[$i]))echo 'selected'; ?>>เลือกผู้อนุมัติโครงการ</option>
          <?php
              while ($result_app = $query_select_app->fetch_assoc()) {

             ?>
                <option value="<?php echo $result_app['User_ID']; ?>" <?php if(isset($check[$i])){if($check[$i]==$result_app['User_ID'])echo 'selected';} ?>><?php echo $result_app['Name']; ?></option>
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
document.getElementById("fileToUpload"+i).disabled = true;
}
function Set(i) {
document.getElementById("notb"+i).readOnly = false;
document.getElementById("note"+i).readOnly = false;
document.getElementById("notm"+i).readOnly = false;
document.getElementById("fileToUpload"+i).disabled = false;
}
</script>
