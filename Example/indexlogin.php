<!DOCTYPE html>
<?php
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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

  </head>
  <body background="#" style="background-attachment: fixed;
  background-repeat: repeat;">

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">



  <nav class="navbar fixed-top light " style="background-color:#EE0000;">
          <a class="navbar-brand" href="#">&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>
          <ul class="nav justify-content-end">
           <li class="nav-item">
			<a class="nav-link disabled" href="#" style="color:#FFFFFF;"><label data-toggle="modal" data-target="#exampleModal">
			<img src="pic/icons8-Male User Filled-50 (1).png" width="50" height="50" border="0" alt="">&nbsp;&nbsp;login</label></div></a>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<FONT COLOR=black><h5 class="modal-title" id="exampleModalLabel" >Login</h5></font>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
	  </li>
     </ul>
  </nav><br><br>
  <div class="modal-body">
		    <form action = "#" method = "post">
				  <div  class="form-group">
					  <FONT COLOR=black>
						<label>Username</label>
						<input type="text" class="form-control" id="Username" name="Username" placeholder="กรอกชื่อผู้เข้าใช้">
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" id="Password" name="Password" placeholder="กรอกรหัสผ่าน">
					  </div>
					  <div class="form-check">
						<label class="form-check-label">
						  <input type="checkbox" class="form-check-input" >จดจำรหัสผ่าน
						 </label> </font>
					  </div>
					</div>
				  <div class="modal-footer">
					<button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				  </div>
				 </div>
           </form>
       </div>
    </div>




<!--  <nav class="navbar fixed-top light " style="background-color:#EE0000;">
          <a class="navbar-brand" href="#">&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>
          <ul class="nav justify-content-end">
           <li class="nav-item">
			<a class="nav-link disabled" href="#" style="color:#FFFFFF;"><label data-toggle="modal" data-target="#exampleModal">
			<img src="pic/icons8-Male User Filled-50 (1).png" width="50" height="50" border="0" alt="">&nbsp;&nbsp;login</label></div></a>
           </li>
         </ul> -->
          <?php
          require_once("connect.php");
          if(isset($_POST['submit'])){

          	$Username = $_POST['Username'];
          	$Password = $_POST['Password'];
          	$strSQL = "SELECT * FROM employee WHERE Username = '".$Username."'
          	and Password = '".$Password."'";
          	$objQuery = mysqli_query($con,$strSQL);
          	$objResult = mysqli_fetch_array($objQuery);
          	if(!$objResult)
          	{
          		echo "Username and Password Incorrect!";
          		exit();
          	}
          	else if($objResult['Username'] == $Username && $objResult['Password']==$Password )
          	{
          			$_SESSION['User_ID'] = $objResult['User_ID'];
          			$_SESSION['Username'] = $objResult['Username'] ;
          			$_SESSION['Status'] = $objResult['Status'] ;
          			$_SESSION['Name'] = $objResult['Name'];
          			$_SESSION['Work_ID'] = $objResult['Work_ID'];
          			$_SESSION['Position'] = $objResult['Position'];
          			$_SESSION['section']=$objResult['section'];
          			$_SESSION['cell']=$objResult['cell'];
          			$_SESSION['Status']=$objResult['Status'];





          		}
          	else
          		{
          			//*** Go to Main page
          			header("location:page1.php");
          		}
            }


            ?>
            <?php
            if(isset($_SESSION['Status']) and $_SESSION['Status'] == 'ADMIN'){?>

       	   <nav class="navbar fixed-top light " style="background-color:#EE0000;">
                 <a class="navbar-brand" >&nbsp;&nbsp;<img src="SCG.png" alt="" height="60"></a>

                 <ul class="nav justify-content-end">
       		   <li class="nav-item">
       			<a class="nav-link disabled"  style="color:#FFFFFF;">
       			<label data-toggle="modal" data-target="#exampleModal">สถานะ&nbsp;&nbsp;<font size="" color="black">
       			<?php echo $_SESSION['Status'];?></font>&nbsp;&nbsp;ผู้เข้าใช้ &nbsp;<font size="" color="black">
       			<?php echo $_SESSION['Name'];?> |</label></a>
       			<li class="nav-item">
       			<a class="nav-link disabled" href="logout.php" style ="text-decoration:none"> Log Out </a>&nbsp; </font></div>
       			</a>
       			</li>
                  </li>
                 </ul>
               </nav>
       		<?php } ?>


<body class="w3-black"><br><br>
<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="/w3images/avatar_smoke.jpg" style="width:100%">

  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i><img src="pic/icons8-Exterior-50 (1).png" width="50" height="50" border="0" alt=""></i>
    <p><br>HOME</p>
  </a>
  <a href="profile.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i><img src="pic/icons8-Create Document-64.png" width="50" height="50" border="0" alt=""></i>
    <p><br>PROJECT LEADER</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i><img src="pic/icons8-Pass Fail-50.png" width="50" height="50" border="0" alt=""></i>
    <p><br>APPROVE</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i><img src="pic/icons8-Management Filled-50.png" width="50" height="50" border="0" alt=""></i>
    <p><br>MOC</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i><img src="pic/icons8-Assistant-50.png" width="50" height="50" border="0" alt=""></i>
    <p><br>ADMIN</p>
  </a>
</nav>

<!-- Page Content -->

<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small"></span>EMOC</h1>
   <p> Electronic Management of Change Process Safety System</p>


<!-- Content -->
<center><div class="w3-content" style="max-width:1100px;margin-top:5px;margin-bottom:10px">
  <!-- Slideshow -->
  <div class="w3-container">
    <div class="w3-display-container mySlides" >

      <img src="pic/social1.jpg"  style="width:100%">
      <div class="w3-display-topleft w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">ความปลอดภัยของบุคคล</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="pic/social1.jpg" style="width:100%">
      <div class="w3-display-middle w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">ความปลอดภัยของเครื่องจักร</span>
      </div>
    </div>
    <div class="w3-display-container mySlides">
      <img src="pic/social1.jpg" style="width:100%">
      <div class="w3-display-topright w3-container w3-padding-32">
        <span class="w3-white w3-padding-large w3-animate-bottom">ความปลอดภัยการผลิต</span>
      </div>
    </div>

    <!-- Slideshow next/previous buttons -->
    <div class="w3-container w3-dark-grey w3-padding w3-xlarge">
      <div class="w3-left" onclick="plusDivs(-1)"><img src="pic/icons8-Prev-50.png" width="50" height="50" border="0" alt=""></div>
      <div class="w3-right" onclick="plusDivs(1)"><img src="pic/icons8-Right Button-50.png" width="50" height="50" border="0" alt=""></i></div>

      <div class="w3-center">
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-tag demodots w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>

    </div>
  </div>




  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about" >
    <h2 class="w3-text-light-black">EMOC</h2>
    <hr style="width:200px" >
    <p>กิจกรรมการดำเนินงานด้านความปลอดภัยในกระบวนการผลิต (Process Safety) และความปลอดภัยของบุคคล (Personal Safety) <br>เป็นกิจกรรมหลักที่ส่งเสริมให้องค์กรบรรลุผลการดำเนินงานด้านความปลอดภัย มั่นคง อาชีวอนามัยและสิ่งแวดล้อมที่ดีที่สุดตั้งแต่เริ่มต้นดำเนินงาน รวมทั้งปราศจากอุบัติเหตุขั้นร้ายแรง กิจกรรมด้านความปลอดภัยในกระบวนการผลิตที่ได้นำไปสู่การปฏิบัติอย่างมีประสิทธิผล <br>นอกจากนี้การยกระดับผลการดำเนินงานด้านความปลอดภัยของบุคคลผ่านกระบวนการปรับปรุงระบบการจัดการอุบัติการณ์ การพัฒนาระบบการจัดการ การสร้างวัฒนธรรมความปลอดภัยฯ และการปลูกฝังพฤติกรรมความปลอดภัย ก็สามารถดำเนินการได้เสร็จสมบูรณ์ตามแผนที่กำหนดไว้ ซึ่งส่งผลให้การผลิตและการเกิดอุบัติเหตุที่มีการบาดเจ็บทั้งหมดลดลงอย่างมีนัยสำคัญ
    </p>
    </div>
 </header>
   </div>

 <footer class="w3-container w3-teal w3-center w3-margin-top">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">SCG</a></p>
</footer>



</body>
</html>


<script>
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}
</script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="jquery/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>


<?mysqli_close($con);?>
  </body>
</html>
