<?php session_start();
$userid=@$_SESSION['Work_ID'] ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="flick/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />
<link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<!--W3school1-->
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--W3school2-->
<link rel="stylesheet" href="moc/css/css-2.css">
<link rel="stylesheet" href="moc/css/font2.css">
<link rel="stylesheet" href="moc/css/w3.css">

<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>

<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>

<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>

<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>



    <style>
       html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    </style>
  </head>

  <nav class="navbar fixed-top light " style="background-color:#EE0000;">
      <a class="navbar-brand" >&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>
       <ul class="nav justify-content-end">
         <li class="nav-item">
           <a class="nav-link disabled"  style="color:#FFFFFF;">
             <label data-toggle="modal" data-target="#exampleModal">
               สถานะ&nbsp;&nbsp;<font size="" color="black"><?php echo $_SESSION['Status'];?></font>&nbsp;&nbsp;ผู้เข้าใช้ &nbsp;
             <font size="" color="black">
             <?php echo $_SESSION['Name'];?> |</label>
           </a>
         <li class="nav-item">
            <a class="nav-link disabled" href="logout.php" style ="text-decoration:none"> Log Out </a>&nbsp; </font>
         </li>
            </li>
      </ul>
  </nav>

  <br><br>
  <body class="w3-black"><br><br>
  <!-- Icon Bar (Sidebar - hidden on small screens) -->

  <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">


    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i><img src="pic/icons8-Exterior-50 (1).png" width="50" height="50" border="0" alt=""></i>
      <p><br>HOME</p>
    </a>

  <!-- ProjectLeader -->
    <?php
    if(isset($_SESSION['Status']) and @$_SESSION['Status'] == 'Project' or  @$_SESSION['Status'] == 'ADMIN'
    or @$_SESSION['Status'] == 'Approve' or @$_SESSION['Status'] == 'MOC'){?>

    <a href="testpro.php" class="w3-bar-item w3-button w3-padding-large w3-black">
      <i><img src="pic/icons8-Create Document-64.png" width="50" height="50" border="0" alt=""></i>
      <p><br>PROJECT LEADER</p>
    </a>

    <?php } ?>

  <!-- Approve -->
  <?php
  if(isset($_SESSION['Status']) and @$_SESSION['Status'] == 'ADMIN' or @$_SESSION['Status'] == 'Approve' or @$_SESSION['Status'] == 'MOC'){?>
    <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i><img src="pic/icons8-Pass Fail-50.png" width="50" height="50" border="0" alt=""></i>
      <p><br>APPROVE</p>
    </a>
  <?php } ?>

  <!-- MOC -->
  <?php
  if(isset($_SESSION['Status']) and @$_SESSION['Status'] == 'ADMIN' or @$_SESSION['Status'] == 'Approve' or @$_SESSION['Status'] == 'MOC'){?>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i><img src="pic/icons8-Management Filled-50.png" width="50" height="50" border="0" alt=""></i>
      <p><br>MOC</p>
    </a>
    <?php } ?>

  <!-- ADMIN -->
    <?php
    if(isset($_SESSION['Status']) and @$_SESSION['Status'] == 'ADMIN'){?>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i><img src="pic/icons8-Assistant-50.png" width="50" height="50" border="0" alt=""></i>
      <p><br>ADMIN</p>
    </a>
    <?php } ?>
  </nav>

  <!-- Page Content -->
  <br><div class="w3-content w3-margin-right" style="max-width:1500px;">

    <!-- The Grid -->
    <div class="w3-row-padding">

   <!-- Left Column -->
   <div class="w3-third">

        <div class="w3-white w3-text-grey w3-card-4">
          <div class="w3-display-container">
           <br> <center><img src="Login456.jpg" style="width:50%" alt="Avatar"></center>
  			<div class="w3-display-bottomleft w3-container w3-text-black">
   </div>

         </div>
          <div class="w3-container">

            <br>
  		  <p><i><img src="pic/icons8-male-user.png" width="30" height="30" border="0" alt=""></i>&nbsp;รหัสพนักงาน&nbsp;:&nbsp;
  		  <?php echo $_SESSION['Work_ID'];?></p>

            <p><i><img src="pic/icons8-name-tag.png" width="30" height="30" border="0" alt=""></i>&nbsp;ชื่อพนักงาน&nbsp;&nbsp;&nbsp;:&nbsp;
  		  <?php echo $_SESSION['Name'];?></p>

            <p><i><img src="pic/icons8-crowd.png" width="30" height="30" border="0" alt=""></i>&nbsp;แผนก&nbsp;:&nbsp;
  		  <?php echo $_SESSION['section'];?></p>

            <p><i><img src="pic/icons8-queue.png" width="30" height="30" border="0" alt=""></i>&nbsp;ส่วน&nbsp; : &nbsp;
  		  <?php echo $_SESSION['cell'];?></p>

  		   <p><i><img src="pic/icons8-worker.png" width="30" height="30" border="0" alt=""></i>&nbsp;ตำแหน่ง &nbsp;:&nbsp;
  		  <?php echo $_SESSION['Position'];?></p>


            <p class="w3-large"><b>
            <div class="w3-light-grey w3-round-xlarge w3-small">
              <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:80%">
              </div>
            </div>
            <div class="w3-light-grey w3-round-xlarge w3-small"></div>
            <div class="w3-light-grey w3-round-xlarge w3-small"></div>
            <br>
            <div class="w3-light-grey w3-round-xlarge"></div>
            <div class="w3-light-grey w3-round-xlarge"></div>
            <div class="w3-light-grey w3-round-xlarge"></div>
            <br>
          </div>
        </div>

      <!-- End Left Column -->
      </div>

   <!-- Right Column -->
<form class="" action="#" method="post" style="margin-bottom: 0px;">
   <div class="w3-twothird">

     <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
       <h3 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>แบบฟอร์มแจ้งขอดำเนินการเปลี่ยนแปลง MOC (Management of Change)</h3>
       <h4 class="w3-text-grey w3-padding-16">ชื่อโครงการ&nbsp;&nbsp;&nbsp;<input type="text" name="projectname" class="form-control"></h4>
       <h5 class="w3-text-grey w3-padding-16">ส่วนที่ 1 สำหรับเจ้าของงานที่ต้องการปรับปรุง หรือ เปลี่ยนแปลง</h5>
        <div id="accordion" role="tablist" >
          <div class="card">
            <div class="card-header" role="tab" id="headingOne" >
              <h5 class="mb-0" >
                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="checkbox">
                   <label><input type="checkbox" name="type[]" value="ติดตั้งเครื่องจักรใหม่ (New Project)"><font color="#666666" >&nbsp;ติดตั้งเครื่องจักรใหม่ (New Project)</font></label>
                 </div>
                </a>
              </h5>
            </div>
            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <div class="checkbox">
                  <label><input type="checkbox"  name="topipms[]" value="ผ่านการพิจารณา">&nbsp;ผ่านการพิจารณา IPM</label>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
              <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="checkbox">
                   <label ><input type="checkbox" name="type[]" value="การเปลี่ยนแปลงเทคโนโลยี (Change in Technology)"><font color="#666666">&nbsp;การเปลี่ยนแปลงเทคโนโลยี (Change in Technology)</font></label>
                  </div>
                </a>
              </h5>
          </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <div class="checkbox">
                  <label><input type="checkbox" name="topchange[]" value="เครื่องจักรเดิมที่มีอยู่หรือเครื่องผลิตไอน้ำและบดเชื้อเพลิง">&nbsp;เครื่องจักรเดิมที่มีอยู่หรือเครื่องผลิตไอน้ำและบดเชื้อเพลิง</label><br>
                  <label><input type="checkbox" name="topchange[]" value="ติดตั้ง/เพิ่มเติม เพื่อเปลี่ยนแปลงการผลิต,เพิ่ม Capacity เครื่องจักร">&nbsp;ติดตั้ง/เพิ่มเติม เพื่อเปลี่ยนแปลงการผลิต,เพิ่ม Capacity เครื่องจักร</label><br>
                  <label><input type="checkbox" name="topchange[]" value="เปลี่ยนแปลงระบบ Safety & Sequence Interlock">&nbsp;เปลี่ยนแปลงระบบ Safety & Sequence Interlock</label><br>
                  <label><input type="checkbox" name="topchange[]" value="เปลี่ยนวัตถุดิบเชื้อเพลิง , waste AF AR,สารเคมี,ตัวเร่งปฏิกิริยา">&nbsp;เปลี่ยนวัตถุดิบเชื้อเพลิง , waste AF AR,สารเคมี,ตัวเร่งปฏิกิริยา</label><br>
                  <label><input type="checkbox" name="topchange[]" value="เปลี่ยนแปลงวัตถุระเบิด,บรรจุภัณฑ">&nbsp;เปลี่ยนแปลงวัตถุระเบิด,บรรจุภัณฑ์</label><br>
                  <label><input type="checkbox" name="topchange[]" value="วิธีการปฏิบัติงาน,ผลิตภัณฑ์ลอยได้และของเสีย">&nbsp;วิธีการปฏิบัติงาน,ผลิตภัณฑ์ลอยได้และของเสีย</label><br>
                  <label><input type="checkbox" name="topchange[]" value="อื่นๆโป">&nbsp;</label>อื่นๆโปรดระบุ <input type="text">
                </div>
            </div>
           </div>
         </div>
         <div class="card">
          <div class="card-header" role="tab" id="headingThree">
           <h5 class="mb-0">
             <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               <div class="checkbox">
                <label><input type="checkbox" name="type[]" value="การเปลี่ยนแปลงสิ่งอำนวยความสะดวก (Change ib Facilities)"><font color="#666666">&nbsp;การเปลี่ยนแปลงสิ่งอำนวยความสะดวก (Change ib Facilities)</font></label>
               </div>
             </a>
           </h5>
         </div>
         <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
           <div class="card-body">
             <div class="checkbox">
                 <label><input type="checkbox" name="fac[]" value="อาคารเครื่องจักร,ทางเข้า-ออกของบันไดทางหนีไฟ,ระบบดับเพลิง">&nbsp;อาคารเครื่องจักร,ทางเข้า-ออกของบันไดทางหนีไฟ,ระบบดับเพลิง</label><br>
                 <label><input type="checkbox" name="fac[]" value="ระบบท่อก๊าซ,ระบบไฟฟ้า,ระบบลมอัดอากาศ(Compressed Air),ระบบน้ำ,รางระบาน">&nbsp;ระบบท่อก๊าซ,ระบบไฟฟ้า,ระบบลมอัดอากาศ(Compressed Air),ระบบน้ำ,รางระบาน้ำ</label><br>
                 <label><input type="checkbox" name="fac[]" value="อื่นๆโปรดระบุ">&nbsp;</label>อื่นๆโปรดระบุ <input type="text">
              </div>
          </div>
        </div>
      </div><br>

        <h5 class="w3-text-grey"></i>รายละเอียดของโครงการ</h5>
        <div class="w3-container">

         <div class="container">
           <br>
          <font class="w3-text-grey">วันที่ต้องการเปลี่ยน</font>

            <div class="input-append date form_datetime">
               <input size="16" type="text" value="" readonly>
               <span class="add-on"><i class="icon-th"></i></span>
            </div>
            <?php


             ?>

          <div class="form-group row"  >
            <label for="colFormLabel" class="col-sm-3 col-form-label" >Process ที่ต้องการเปลียน</label>
            <div class="col-sm-9">
              <input type="email"  name="Prochange" class="form-control form-control" id="colFormLabel" placeholder="กรุณากรอกข้อมูล">
            </div><br><br>
            <label for="colFormLabel" class="col-sm-3 col-form-label">เครื่องจักรที่เปลี่ยน</label>
            <div class="col-sm-9">
              <input type="email" name="machine" class="form-control form-control" id="colFormLabel" placeholder="กรุณากรอกข้อมูล">
            </div><br><br>
            <label for="colFormLabel" class="col-sm-3 col-form-label">สถานที่เปลี่ยน</label>
            <div class="col-sm-9">
              <input type="email" name="place" class="form-control form-control" id="colFormLabel" placeholder="กรุณากรอกข้อมูล">
            </div><br><br>
            <label for="colFormLabel" class="col-sm-3 col-form-label">เหตุที่ขอในการเปลี่ยนแปลง</label>
            <div class="col-sm-9">
              <input type="email" name="reason" class="form-control form-control" id="colFormLabel" placeholder="กรุณากรอกข้อมูล">
            </div><br><br>
            <label for="colFormLabel" class="col-sm-3 col-form-label">วิธีการเปลี่ยนแปลง</label>
            <div class="col-sm-9">
              <input type="email" name="howto" class="form-control form-control" id="colFormLabel" placeholder="กรุณากรอกข้อมูล">
            </div><br><br>
          </div>

        </div>
     <!-- End Right Column -->
    </div>
 </div>

      <center><a href=expert.php><button type="submit" class="btn btn-primary btn-lg" name="en" value="insert">หน้าถัดไป</a></button>
        &nbsp;&nbsp;<a href=project_page.php><button type="button" class="btn btn-secondary btn-lg">ยกเลิก</a></button></center>
      <br>
      <br>


    </form>

</div>
</div>

<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

<?php
include ("connect.php");
$prochange=@$_POST['prochange'];
$machine=@$_POST['machine'];
$place=@$_POST['place'];
$reason=@$_POST['reason'];
$howto=@$_POST['$howto'];
$projectname=@$_POST['projectname'];


if (isset($_POST['en']))
{
  $sqlpro = "insert into project (Project_name,user_ID) values('$projectname','$userid')";
  $resultpro = mysqli_query($con,$sqlpro);
  $next_id = @mysqli_insert_id($con); // คืนค่า id ที่ insert ล่าสุด

  if (!empty($_POST["type"]))
  {
    $type=implode(",",$_POST['type']);
    $sqltype = "insert into project_type (project_type_Name,project_id) values('$type','$next_id')";
    $resulttype = mysqli_query($con,$sqltype);
    $last_id = @mysqli_insert_id($con); // คืนค่า id ที่ insert ล่าสุด

    if (!empty($_POST["topipms"]))
     {
       $top=implode(",",$_POST['topipms']);
       $sqltop = "insert into ipm (IPM_name,Project_type_ID) values('$top','$last_id')";
       $resulttop = mysqli_query($con,$sqltop);

     }
       if (!empty($_POST["topchange"]))
        {
          $topchange=implode(",",$_POST['topchange']);
          $sqltopchange = "insert into teachnology (Teachnology_name,Project_type_ID) values('$topchange','$last_id')";
          $resulttopchange= mysqli_query($con,$sqltopchange);
        }
          if (!empty($_POST["fac"]))
           {
             $fac=implode(",",$_POST['fac']);
             $sqlfac = "insert into facilities(Facilities_name,Project_type_ID) values('$fac','$last_id')";
             $resultfac = mysqli_query($con,$sqlfac);
           }
            if($resultpro)
            {
              echo "บันทึกเรียบร้อย";
            }
            else{
              echo mysqli_error($con);
            }
     }
    else
    {

      echo "กรุณาเลือก";
    }

      $sqldetail = "insert into project_detail(Project_detail_Process,
                    Project_detail_machine,Project_detail_place,Project_detail_reason,Project_detail_howto,Project_detail_file,
                    Project_detail_risk,Project_ID,Project_detail_status) values ('$prochange','$machine','$place','$reason','$howto')";

  }



@mysqli_close($con);

 ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


  </body>

</html>
