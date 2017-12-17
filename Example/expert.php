<?php session_start(); ?>
<!doctype html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

 <head>
  <meta charset="UTF-8">

  <title>หน้ากรอกข้อมูล</title>
 </head>


 <body background="banner.png">

   <nav class="navbar fixed-top light " style="background-color:#EE0000;">
           <a class="navbar-brand" href="#">&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>
           <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" href="#" style="color:#FFFFFF;">Project Leader</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#FFFFFF;">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#FFFFFF;">Approve</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" style="color:#FFFFFF;">logout</a>
            </li>
           </ul>
   </nav><br><br><br><br><br><br>

 <?php
/*$hostname = "localhost";
$username = "root";
$password = "1234";
$dbname = "MOC";

$conn = mysql_connect($hostname,$username,$password);
if (!$conn) die ("ไม่สามารถเข้าสู่ระบบได้");

mysql_select_db ($dbname,$conn) or die ("ไม่สามารถเลือกตารางได้");
mysql_query("SET character_set_results = utf8");
mysql_query("SET character_set_client = utf8");
mysql_query("SET character_set_connection = utf8");

mysql_query("SET NAMES utf- 8",$conn);
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
$sql = "select * from project_leader ";
$result = mysql_query($sql) or die(mysql_error());

$data = mysql_fetch_array($result);*/
?>
<form method="post" action="#">



<div style = "margin:20px">
<form class="form-horizontal" action ="#" method="post">
	<body background-color = "#FFFFFF">
      <div align = "center">




       <div style = "margin:30px">

         <div class="table-responsive">
          <table class="table" >
            <thead>
              <tr style ="background-color:#ffffff;" class="table-success">
                <th>หัวข้อพิจารณา</th>
                <th>มีผลต่องานหรือไม</th>
                <th>ประโยชน์จากการเปลี่ยนแปลง</th>
                <th>ผลกระทบจากการเปลี่ยนแปลง</th>
                <th>แนวทางการแก้ไข</th>
                <th>เอกสารแนบ</th>
                <th>ผู้พิจารณา</th>
                <th>แสดงความคิดเห็น</th>


              </tr>
            </thead>
            <tbody>
              <tr style ="background-color:#ffffff;">
                <td>คุณภาพ</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;" class="table-active">
                <td>การบำรุงรักษา</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;">
                <td>กระบวนการ</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;">
                <td>ความปลอดภัย</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;">
                <td>สิ่งแวดล้อม</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;">
                <td>กฏหมาย</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style ="background-color:#ffffff;">
                <td>ชุมชน</td>
                <td>มีผล</td>
                <td>ไม่มีผล</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>


 </form>
 </div>



<center>
<input type="submit" name="add" value="add"/>
<input type="reset" name="Submit2" value="Clear"/>
 </center>



  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="jquery-ui.min.js"></script>
  <script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
 </body>
</html>
