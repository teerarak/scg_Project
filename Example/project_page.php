<?php session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  </head>

   <nav class="navbar fixed-top light " style="background-color:#EE0000;">
          <a class="navbar-brand" >&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>

          <ul class="nav justify-content-end">
		   <li class="nav-item">
			<a class="nav-link disabled"  style="color:#FFFFFF;">
			<label data-toggle="modal" data-target="#exampleModal">สถานะ&nbsp;&nbsp;<font size="" color="black">
			<?php echo @$_SESSION['Status'];?></font>&nbsp;&nbsp;ผู้เข้าใช้ &nbsp;<font size="" color="black">
			<?php echo @$_SESSION['Name'];?> |</label></a>
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

    <div class="w3-twothird">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16">
		<i><img src="pic/icons8-new-file.png" width="40" height="40" border="0" alt=""></i>&nbsp;Project Leader</h2>
        <div class="w3-container">
           <div class="container">

<div class="w3-container w3-center">

<table width ="300" class="table table-condensed table-bordered table-striped" align="center">
   <thead>
    <tr class="table-success">
    <th><center>รหัสโครงการ</center></th>
    <th><center>ชื่อโครงการ</center></th>
		<th><center>สถานะโครงการ</center></th>
		<th><center>ผู้อนุมัติโครงการ</center></th>
		<th><center>แก้ไขโครงการ</center></th>
		<th><center>หมายเหตุ</center></th>
		<th><center>วันที่สร้างโครงการ</center></th>


      </tr>
    </thead>
    <tbody>
				<?php
				include ("connect.php");

				 $querys = "SELECT * FROM project ";
				/*3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . */
				$results = @mysqli_query($con, $querys);
				/*4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: */

				 while($rows = @mysqli_fetch_array($results)) {

							@$_SESSION['Project_ID'] = $rows['Project_ID'] ;
							@$_SESSION['Project_name'] = $rows['Project_name'] ;
							@$_SESSION['Project_typeID'] = $rows['Project_typeID'];
							@$_SESSION['Project_Date'] = $rows['Project_Date'];
				?>
     <tr class="table table-bordered">
		<td><?php  echo$_SESSION["Project_ID"];?></td>
		<td><?php echo $_SESSION['Project_name'];?></td>
		<td></td>
		<td></td>
		<td><?php echo "<a href='index.php?ID=$rows[0]'>EDIT</a>";?></td>
		<td> </td>
		<td><?php echo $_SESSION['Project_Date'];?> </td>
     </tr>
	 <?php }
	 mysqli_close($con);
	 ?>



  </tbody>
  </table>

<a href="home.php" class="btn btn-primary btn-lg" role="button" aria-pressed="true">เริ่มโครงการ</a>
<br><br>

  </div>
</div>
</div>
  </div>


    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>



</body>
</html>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>



  </body>
</html>
