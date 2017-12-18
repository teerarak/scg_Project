<div class="container">

  <form class="" action="#" method="POST">
    <div id="accordion" role="tablist">
      <h2 class="mt-4">แบบฟอร์มแจ้งขอดำเนินการเปลี่ยนแปลง MOC (Management of Change)</h2><br>
      <div class="form-group">
        <h4 for="Project_name">ชื่อโครงการ</h4>
        <input type="text" name="Project_name" class="form-control" placeholder="กรอกชื่อโครงการ" required>
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
              <input type="checkbox" id="IPM" name="IPM" value="<?php echo $row['IPM_ID']; ?>">
              <label for="IPM"><?php echo $row['IPM_Name']; ?></label>  <br>
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
              $select_tech = "SELECT * FROM teachnology";
              $qurey_tech = $connect->query($select_tech);
              $i=0;
              while ($row = $qurey_tech->fetch_array()) {
             ?>
              <input type="checkbox" id="Technology<?php echo $i; ?>" name="Technology[]" value="<?php echo $row['Technology_ID']; ?>">
              <label for="Technology<?php echo $i; ?>">
                <?php echo $row['Teachnology_Name']; ?>
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

              <input type="checkbox" id="Facilities<?php echo $j; ?>" name="Facilities[]" value="<?php echo $row['Facilities_ID']; ?>" class="chk">
              <label for="Facilities<?php echo $j; ?>">
                <?php echo $row['Facilities_Name']; ?>
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
          <label style="color:red;margin-left:30px;">*</label>
          <label for="date">วันที่ดำเนินการ</label>
          <div class="row">
            <div class="col">
              <input type="date" name="Project_Startdate" class="form-control" id="date1"  required>
            </div>
            <div class="col">
              <input type="date" name="Project_Enddate" class="form-control " id="date2" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label style="color:red;margin-left:30px;">*</label>
          <label for="Project_Process">Process ที่ต้องการเปลี่ยน</label>
          <input type="text" name="Project_Process" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label style="color:red;margin-left:30px;">*</label>
          <label for="Project_Machine">เครื่องจักรที่ต้องการเปลี่ยน</label>
          <input type="text" name="Project_Machine" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label style="color:red;margin-left:30px;">*</label>
          <label for="Project_Place">สถานที่เปลี่ยน</label>
          <input type="text" name="Project_Place" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label style="color:red;margin-left:30px;">*</label>
          <label for="Project_Reason">เหตุที่ขอในการเปลี่ยนแปลง</label>
          <input type="text" name="Project_Reason" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label style="color:red;margin-left:30px;">*</label>
          <label for="Project_Howto">วิธีการเปลี่ยนแปลง</label>
          <input type="text" name="Project_Howto" class="form-control" placeholder="กรอกข้อมูล" required>
        </div>
        <div class="form-group">
          <label></label>
          <label for="Project_Howto" class="mr-4">การประเมินความเสี่ยงและสิ่งแวดล้อม</label>
            <input type="radio" name="Project_Risk" class="" value="ยอมรับได้" required> ยอมรับได้
            <input type="radio" name="Project_Risk" class="" value="ปานกลาง" required> ปานกลาง
            <input type="radio" name="Project_Risk" class="" value="สูง" required> สูง
        </div>
        <div class="text-center mt-4">
          <input type="submit" name="newproject" class="btn btn-primary" value="บันทึกแบบร่าง">
          <button type="reset" class="btn btn-danger">ยกเลิก</button>
        </div>
    </div>
  </form>
</div>

<?php
  if (isset($_POST['newproject'])) {
    $date1 = $_POST['Project_Startdate'];
    $date2 = $_POST['Project_Enddate'];
      //start day
      $year1 = $date1[0]."".$date1[1]."".$date1[2]."".$date1[3];
      $month1 = $date1[5].$date1[6];
      $day1 = $date1[8].$date1[9];
      //end day
      $year2 = $date2[0]."".$date2[1]."".$date2[2]."".$date2[3];
      $month2 = $date2[5].$date2[6];
      $day2 = $date2[8].$date2[9];

      if ($year1 <= $year2) {

          if ($month1 <= $month2) {


                $User_ID = $_SESSION['User_ID'];
                $Project_name = $_POST['Project_name'];
                $Project_Startdate = $_POST['Project_Startdate'];
                $Project_Enddate = $_POST['Project_Enddate'];
                $Project_Process = $_POST['Project_Process'];
                $Project_Machine = $_POST['Project_Machine'];
                $Project_Place = $_POST['Project_Place'];
                $Project_Reason = $_POST['Project_Reason'];
                $Project_Howto = $_POST['Project_Howto'];
                $IPM = $_POST['IPM'];
                $Technology = $_POST['Technology'];
                $Facilities = $_POST['Facilities'];
                $TechnologyOther = $_POST['TechnologyOther'];
                $FacilitiesOther = $_POST['FacilitiesOther'];
                $Project_Risk = $_POST['Project_Risk'];
                date_default_timezone_set("Asia/Bangkok");
                $Project_Date = date('Y-m-d H:i:s');
                 // INSERT PROJECT
      $sql = "INSERT INTO project (
        Project_name,
        Project_Date,
        Project_Startdate,
        Project_Enddate,
        User_ID,
        Status_ID
      )
      VALUES ('$Project_name','$Project_Date','$Project_Startdate','$Project_Enddate','$User_ID','1')";
      echo "$sql";
      $connect->query($sql);
      // select ID
      $select_project_id = "SELECT Project_ID FROM project ORDER BY Project_ID DESC LIMIT 1";
      $result = $connect->query($select_project_id);
      $row = $result->fetch_array();
      $Project_ID = $row['Project_ID'];
      $sqlDetailProject = "INSERT INTO project_detail
      (
        Project_ID,
        Project_detail_Reason,
        Project_detail_Risk,
        Project_detail_Process,
        Project_detail_Place,
        Project_detail_Date,
        Project_detail_Machine,
        Project_detail_Howto,
        Project_detail_File
      )
      VALUES (
        $Project_ID,
        '$Project_Reason',
        '$Project_Risk',
        '$Project_Process',
        '$Project_Place',
        '$Project_Date',
        '$Project_Machine',
        '$Project_Howto',
        ''
      )";
      $connect->query($sqlDetailProject);



          if ($TechnologyOther != '') {
              $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$TechnologyOther."')";
              $connect->query($sqldetail);
            } else if ($FacilitiesOther != '') {
          $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$FacilitiesOther."')";
          $connect->query($sqldetail);
      }
      // INSERT detail
            if (isset($_POST['Technology'])) {
          for ($a=0; $a < $i ; $a++) {
        if ($Technology[$a] != '') {
            $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$Technology[$a]."')";
            $connect->query($sqldetail);
            echo "Complete";
            }
          }
        } else if (isset($_POST['Facilities'])) {
      for ($a=0; $a < $j ; $a++) {
      if ($Facilities[$a] != '') {
        $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$Facilities[$a]."')";
        $connect->query($sqldetail);
        echo "Complete";
          }
        }
      }
      else {
        $sqldetail = "INSERT INTO project_detail (Project_ID,Type_Project) VALUES ('$Project_ID','".$IPM."')";
        $connect->query($sqldetail);
      }
        header("Location:?menu=addproject&Project_ID=$Project_ID");


          } else {
           echo '<script>alert("กรุณาระบุวันที่ ให้ถูกต้อง!")</script>';
          header("Refresh:3; url=index.php?menu=Leader");
          }
      }
      else {
         echo '<script>alert("กรุณาระบุวันที่ ให้ถูกต้อง!")</script>';
       header("Refresh:3; url=index.php?menu=Leader");
      }





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
