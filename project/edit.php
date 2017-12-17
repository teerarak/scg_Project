<?php
  $select = "";

 ?>
<div class="container">
  <h2 class="mt-4">แก้ไข แบบฟอร์มแจ้งขอดำเนินการเปลี่ยนแปลง MOC (Management of Change)</h2><br>
  <?php
  $sql="SELECT * FROM project WHERE (Status_ID = 1 || Status_ID = 6) && User_ID=".$_SESSION['User_ID'];
  $qurey = $connect->query($sql);
  if ($qurey->num_rows > 0) {

  ?>
  <form class="" method="post">
    <label for="Project_id">เลือก Project ที่ต้องการแก้ไข</label>
    <select class="custom-select" name="Project_id" id="Project_id" value="<?php echo $row['Project_ID']  ?>">
  <?php
    while ($row = $qurey->fetch_array()) {
  ?>
    <option value="<?php echo $row['Project_ID']  ?>"><?php echo "#".$row['Project_ID']." - ".$row['Project_name'] ?></option>
  <?php
}
  ?>
    </select>
    <button type="submit" class="btn btn-primary" name="button">เลือก</button>
  <?php }
  else{ ?>
<h3>ไม่มี Project ที่แก้ไขได้</h3>
  <?php } ?>
  </form>

  <?php
  if(isset($_POST['button'])){
    $Project_id=$_POST['Project_id'];
    $check=array();
    $sql = "SELECT Type_Project FROM project_detail WHERE Project_ID = ".$Project_id;//หาcheck
    $qurey= $connect->query($sql);
    while ($result = $qurey->fetch_array()) {
      $check[$result['Type_Project']]=true;
    }
    $sql = "SELECT * FROM project INNER JOIN project_detail ON project.Project_ID = project_detail.Project_ID WHERE project.Project_ID = ".$Project_id." LIMIT 1";
    $qurey= $connect->query($sql);
    while ($result = $qurey->fetch_array()) {

   ?>

  <form class="" action="#" method="POST">
    <div id="accordion" role="tablist">
      <input type="hidden" name="Project_ID" value="<?php echo $Project_id  ?>">
      <div class="form-group">
        <h4 for="Project_name">ชื่อโครงการ</h4>
        <input type="text" value="<?php echo $result['Project_name'] ?>" name="Project_name" class="form-control" placeholder="กรอกชื่อโครงการ" required>
      </div>
      <h4 for="sec1">ส่วนที่ 1 สำหรับเจ้าของงานที่ต้องการปรับปรุง หรือ เปลี่ยนแปลง</h4>
      <div class="card">
        <div class="card-header" role="tab" id="headingOne">
          <h5 class="mb-0">
            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onclick="clears()">
              ติดตั้งเครื่องจักรใหม่ (New Project)
            </a>
          </h5>
        </div>

        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
            <?php
              $select_ipm = "SELECT * FROM ipm";
              $qurey_ipm = $connect->query($select_ipm);
              while ($row = $qurey_ipm->fetch_array()) {
             ?>
              <input type="checkbox" id="IPM" name="IPM" value="<?php echo $row['IPM_ID']; ?>" class="chk" <?php if(isset($check[$row['IPM_ID']])){echo 'checked';} ?>>
              <label for="IPM"><?php echo $row['IPM_name']; ?></label>  <br>
             <?php
              }
              ?>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" role="tab" id="headingTwo">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="clears()">
              การเปลี่ยนแปลงเทคโนโลยี (Change in Technolgy)
            </a>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <?php
              $select_tech = "SELECT * FROM technology";
              $qurey_tech = $connect->query($select_tech);
              $i=0;
              while ($row = $qurey_tech->fetch_array()) {
             ?>
              <input type="checkbox" id="Technology<?php echo $i; ?>" name="Technology[]" value="<?php echo $row['Technology_ID']; ?>" class="chk" <?php if(isset($check[$row['Technology_ID']])){echo 'checked';} ?>>
              <label for="Technology<?php echo $i; ?>">
                <?php echo $row['Technology_Name']; ?>
              </label>
                <br>
             <?php
                $i++;
              }
              ?>
              <input type="checkbox" id="Technology" name="Technologyz" value="อื่นๆ">
              อื่นๆ <label for="Technology">
               <input type="text" name="TechnologyOther" class="form-control inputoonoon" placeholder="โปรดระบุ">
               </label>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" role="tab" id="headingThree">
          <h5 class="mb-0">
            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" onclick="clears()">
              การเปลี่ยนแปลงสิ่งอำนวยความสะดวก (Change in Facilities)
            </a>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            <?php
              $select_faci = "SELECT * FROM facilities";
              $qurey_faci = $connect->query($select_faci);
              $j=0;
              while ($row = $qurey_faci->fetch_array()) {
             ?>

              <input type="checkbox" id="Facilities<?php echo $j; ?>" name="Facilities[]" value="<?php echo $row['Facilities_ID']; ?>" class="chk" <?php if(isset($check[$row['Facilities_ID']])){echo 'checked';} ?>>
              <label for="Facilities<?php echo $j; ?>">
                <?php echo $row['Facilities_name']; ?>
              </label><br>
             <?php
                $j++;
              }
              ?>
              <input type="checkbox" id="Facilities" name="Facilitiesz" value="อื่นๆ">
              อื่นๆ <label for="Facilities">
               <input type="text" name="FacilitiesOther" class="form-control inputoonoon" placeholder="โปรดระบุ">
               </label>
          </div>
        </div>
      </div>
    </div>
    <div class="detail mb-5">
        <h4 class="mt-4">รายละเอียดโครงการ</h4> <br>
        <div class="form-group">
          <label for="date">วันที่ดำเนินการ</label>
          <div class="row">
            <div class="col">
              <input type="date" name="Project_Startdate" value="<?php echo substr($result['Project_Startdate'],0,10)?>" class="form-control" placeholder="วันที่ต้องการเปลี่ยน" required>
            </div>
            <div class="col">
              <input type="date" name="Project_Enddate" value="<?php echo substr($result['Project_Enddate'],0,10) ?>" class="form-control " placeholder="วันที่ต้องการเปลี่ยน" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="Project_Process">Process ที่ต้องการเปลี่ยน</label>
          <input type="text" name="Project_Process" value="<?php echo $result['Project_Process'] ?>" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label for="Project_Machine">เครื่องจักรที่ต้องการเปลี่ยน</label>
          <input type="text" name="Project_Machine" value="<?php echo $result['Project_Machine'] ?>" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label for="Project_Place">สถานที่เปลี่ยน</label>
          <input type="text" name="Project_Place" value="<?php echo $result['Project_Place'] ?>" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label for="Project_Reason">เหตุที่ขอในการเปลี่ยนแปลง</label>
          <input type="text" name="Project_Reason" value="<?php echo $result['Project_Reason'] ?>" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label for="Project_Howto">วิธีการเปลี่ยนแปลง</label>
          <input type="text" name="Project_Howto" value="<?php echo $result['Project_Howto'] ?>" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label for="Project_Howto" class="mr-4">การประเมินความเสี่ยงและสิ่งแวดล้อม</label>
            <input type="radio" name="Project_Risk" class="" value="ยอมรับได้" <?php if($result['Project_Risk']=='ยอมรับได้'){echo 'checked';} ?> required> ยอมรับได้
            <input type="radio" name="Project_Risk" class="" value="ปานกลาง" <?php if($result['Project_Risk']=='ปานกลาง'){echo 'checked';} ?> required> ปานกลาง
            <input type="radio" name="Project_Risk" class="" value="สูง" <?php if($result['Project_Risk']=='สูง'){echo 'checked';} ?> required> สูง
        </div>
        <div class="text-center mt-4">
          <input type="submit" name="edit" class="btn btn-primary" value="หน้าถัดไป">
          <button type="reset" class="btn btn-danger">ยกเลิก</button>
        </div>
    </div>
  </form>
</div>

<?php
  }
}
  if (isset($_POST['edit'])) {
    $Project_ID=$_POST['Project_ID'];
    $Project_name = $_POST['Project_name'];
    $Project_Startdate = $_POST['Project_Startdate'];
    $Project_Enddate = $_POST['Project_Enddate'];
    $Project_Process = $_POST['Project_Process'];
    $Project_Machine = $_POST['Project_Machine'];
    $Project_Place = $_POST['Project_Place'];
    $Project_Reason = $_POST['Project_Reason'];
    $Project_Howto = $_POST['Project_Howto'];
    $TechnologyOther = $_POST['TechnologyOther'];
    $FacilitiesOther = $_POST['FacilitiesOther'];
    $Project_Risk = $_POST['Project_Risk'];

      // INSERT PROJECT
      $sql = "UPDATE project SET Project_name='$Project_name',Project_Startdate='$Project_Startdate',Project_Enddate='$Project_Enddate',Project_Process='$Project_Process',Project_Machine='$Project_Machine',
                           Project_Place='$Project_Place',Project_Reason='$Project_Reason',Project_Howto='$Project_Howto',Project_Risk='$Project_Risk'
                          WHERE Project_ID=".$Project_ID;
       $connect->query($sql);
      echo "<script type='text/javascript'>
        alert('$sql');
      </script>";
       // select ID
       $select_project_id = "DELETE FROM project_detail WHERE Project_ID = ".$Project_ID;
       $connect->query($select_project_id);

       /*if ($TechnologyOther != '') {
         $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$TechnologyOther."')";
         $connect->query($sqldetail);
       } else if ($FacilitiesOther != '') {
         $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$FacilitiesOther."')";
         $connect->query($sqldetail);
       }*/
       // INSERT detail
       if (isset($_POST['Technology'])) {
         $Technology = $_POST['Technology'];
         for ($a=0; $a <count($Technology) ; $a++) {
           if ($Technology[$a] != '') {
             $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$Technology[$a]."')";
             $connect->query($sqldetail);
           }
         }
       } else if (isset($_POST['Facilities'])) {
         $Facilities = $_POST['Facilities'];
         for ($a=0; $a < count($Facilities) ; $a++) {
           if ($Facilities[$a] != '') {
             $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$Facilities[$a]."')";
             $connect->query($sqldetail);
           }
         }
       }
       else {
         $IPM = $_POST['IPM'];
         $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$IPM."')";
         $connect->query($sqldetail);
       }
       header("Location:?menu=editproject&Project_ID=$Project_ID");
  }
 ?>
<script type="text/javascript">
  $('.collapse').collapse();
  function clears () {
    document.getElementById("IPM").checked = false;
    document.getElementById("Facilities").checked = false;
    document.getElementById("Facilities0").checked = false;
    document.getElementById("Facilities1").checked = false;
    document.getElementById("Technology").checked = false;
    for (var i = 0; i < 8; i++) {
      document.getElementById("Technology" + i).checked = false;
    }
  }
</script>
