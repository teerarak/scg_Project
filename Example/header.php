<?if($_SESSION['status'] == null){?>
   <nav class="navbar navbar-default">
 <div class="container-fluid">
   <!-- Brand and toggle get grouped for better mobile display -->
   <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="index.php">หน้าแรก</a>
   </div>

   <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
       <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           สินค้า<span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="necklace.php">สร้อย</a></li>
           <li><a href="charm.php">กำไลข้อมือ</a></li>
     </ul>
   </li>
        <!-- <li><a href="#">ตะกร้าสินค้า<span class="sr-only">(current)</span></a></li> -->

        <li><a href="payment.php">การชำระเงิน</a></li>
 </ul>
     <ul class="nav navbar-nav navbar-right">
       <!-- Button trigger modal -->
       <li><a href="#" data-toggle="modal" data-target="#myModall">สมัครสมาชิก |</a></li>
       <div class="modal " id="myModall" tabindex="-1" role="dialog" >
         <div class="modal-dialog" style="z-index:1040">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">สมัครสมาชิก</h4>
             </div>
             <div class="modal-body">
        <form  name="register"  method="POST"  class="form-horizontal">
              <div class="form-group">
              <div class="col-sm-2">  </div>
              <div class="col-sm-5" align="left">
              <br>
              <h4> สมัครสมาชิก </h4>
              </div>
              <input name="Admin_level" type="hidden"  value="2" />
              </div>
              <div class="form-group">
              	<div class="col-sm-2" align="right"> ชื่อผู้ใช้งาน : </div>
                 <div class="col-sm-5" align="left">
                   <input  name="Admin_username" type="text" required class="form-control"  placeholder="ชื่อผู่ใช้งาน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
                 </div>
             </div>

               <div class="form-group">
               <div class="col-sm-2" align="right"> รหัสผ่าน : </div>
                 <div class="col-sm-5" align="left">
                   <input  name="Admin_password" type="password" required class="form-control"  placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" minlength="2" />
                 </div>
               </div>
               <div class="form-group">
               <div class="col-sm-2" align="right"> ชื่อ : </div>
                 <div class="col-sm-7" align="left">
                   <input  name="Admin_name" type="text" required class="form-control"  placeholder="ชื่อ-สกุล" />
                 </div>
               </div>
               <div class="form-group">
               <div class="col-sm-2" align="right"> นามสกุล : </div>
                 <div class="col-sm-7" align="left">
                   <input  name="Admin_sur" type="text" required class="form-control" placeholder="นามสกุล" />
                 </div>
               </div>

             <div class="form-group">
             <div class="col-sm-2"> </div>
                 <div class="col-sm-6">
                 <button type="submit" class="btn btn-primary" name="sub" >  สมัครสมาชิก  </button>
                 </div>

             </div>
             </form>
     </div>
   </div>
   </div>
   </div>
       <li><a href="#" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
      <!-- Modal -->
      <div class="modal " id="myModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog" style="z-index:1040">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">เข้าสู่ระบบ</h4>
            </div>
            <div class="modal-body">
         <form  name="formlogin" action="login.php" method="POST"  class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
              <input type="text"  name="Username" class="form-control" required placeholder="ชื่อผู้ใช้งาน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="password" name="Password" class="form-control" required placeholder="รหัสผ่าน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary" id="btn">
              <span class="glyphicon glyphicon-log-in"> </span> เข้าสู่ระบบ </button>
            </div>
          </div>
      </form>
    </div>
  </div>
  </div>
  </div>
  </ul>

   </div><!-- /.navbar-collapse -->
 </div><!-- /.container-fluid -->
</nav>




<?php


  if (isset($_POST['sub'])) {
    $Admin_username = $_POST['Admin_username'];
    $Admin_password = $_POST['Admin_password'];
    $Admin_name = $_POST['Admin_name'];
    $Admin_sur = $_POST['Admin_sur'];
    $sql = "insert into member (name,surname,username,password,status) values ('$Admin_name','$Admin_sur','$Admin_username','$Admin_password','user')";
    $insert=mysqli_query($conn,$sql);
}
	}
 ?>



 <?if($_SESSION['status'] == "user"){?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">หน้าแรก</a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        สินค้า<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="necklace.php">สร้อย</a></li>
        <li><a href="charm.php">กำไลข้อมือ</a></li>

     </ul>
   </li>
     <li><a href="bucket.php">ตะกร้าสินค้า</a></li>
     <li><a href="history.php">ประวัติการสั่งซื้อ</a></li>
     <li><a href="confirm.php">ยืนยันการสั่งซื้อ</a></li>


     <!-- <li><a href="addproduct.php">เพิ่มสินค้า</a></li> -->
</ul>
 <p class="navbar-form navbar-right" >
   <?php echo"|  ยินดีต้อนรับคุณ  ". $_SESSION['Username']; ?>
   <a href="logout.php">| LOGOUT</a>
</p>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


<?}?>

<?php if($_SESSION['status'] == "admin"){?>
 <nav class="navbar navbar-default">
 <div class="container-fluid">
 <!-- Brand and toggle get grouped for better mobile display -->
 <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="#">หน้าแรก</a>
 </div>

 <!-- Collect the nav links, forms, and other content for toggling -->
 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   <ul class="nav navbar-nav">
     <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         สินค้า<span class="caret"></span></a>
       <ul class="dropdown-menu">
         <li><a href="necklace.php">สร้อย</a></li>
         <li><a href="charm.php">กำไลข้อมือ</a></li>
      </ul>
    </li>
      <li><a href="addproduct.php">เพิ่มสินค้า</a></li>
      <li><a href="addproduct.php">ดู Order</a></li>
      <!-- <li><a href="addproduct.php">เพิ่มสินค้า</a></li> -->
 </ul>
  <p class="navbar-form navbar-right" >
    <?php echo"|  ยินดีต้อนรับคุณ  ". $_SESSION['Username']; ?>
<a href="logout.php">| LOGOUT</a>
</p>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
<?}?>
