<!DOCTYPE html>
<html lang="en">
<?php
require 'config/config.php';
include 'header.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <body class="fixed-nav sticky-footer bg-dark" id="page-top">
   <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color:#a51a18;">
     <a class="navbar-brand" href="?menu"><img src="img/logo.png" height="40px" alt=""></a>

     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">

       <?php
       if(isset($_SESSION['Status'])){
         if($_SESSION['Status'] == 'ADMIN'){
           include 'template/navbaradmin.html';
         }
         else if ($_SESSION['Status'] == 'Project') {
           include 'template/navbarproject.html';
         }
         else if ($_SESSION['Status'] == 'MOC') {
            include 'template/navbarmoc.html';
         }
         else if ($_SESSION['Status'] == 'Approve') {
           include 'template/navbarapprove.html';
         }
         else if ($_SESSION['Status'] == 'Manager') {
           include 'template/navbarmanager.html';
         }
      }
      else include 'template/navbar.html';
       ?>
       <ul class="navbar-nav sidenav-toggler">
         <li class="nav-item">
           <a class="nav-link text-center" id="sidenavToggler">
             <i class="fa fa-fw fa-angle-left"></i>
           </a>
         </li>
       </ul>
       <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['User_ID'])){ ?>
                   <li class="nav-item" style="margin-right:20px;margin-top:5px;">
                     <p class="text-light">ชื่อ : <?php echo $_SESSION['Name']; ?></p>
                   </li>
                   <li class="nav-item" style="margin-top:5px;">
                     <p class="text-light">สถานะ : <?php echo $_SESSION['Status']; ?></p>
                   </li>
       <?php } ?>
         <li class="nav-item">
           <?php if(isset($_SESSION['User_ID'])){ ?>
           <a class="nav-link" href="?menu=logout">
             <i class="fa fa-fw fa-sign-out"></i>Logout</a>
           <?php }
           else{ ?>
             <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
               <i class="fa fa-fw fa-sign-out"></i>Login</a>
           <?php } ?>
         </li>
       </ul>
     </div>
   </nav>
   <div class="content-wrapper">
     <div class="container-fluid">
       <!-- Breadcrumbs-->
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="index.php">E-MOC</a>
         </li>
         <li class="breadcrumb-item active"><?php
         if(isset($_GET['menu'])){
           echo $_GET['menu'];
         } ?>
        </li>
       </ol>
       <!-- Icon Cards-->
       <div class="row">
         <?php
          // Check Status
          if(isset($_SESSION['Status'])&&isset($_GET['menu'])){
           if($_SESSION['Status'] == 'ADMIN'){
             if ($_GET['menu']=='Users'){
               include 'admin/user.php';
             }
             else if ($_GET['menu']=='UserAdd'){
               include 'admin/userAdd.php';
             }
             else if ($_GET['menu']=='UserDel'){
               include 'admin/userDel.php';
             }
             else if($_GET['menu']=='logout'){
               session_unset();
               header('Location: index.php');
             }
             else if($_GET['menu']=='Home'){
                include 'admin/index.php';
             }
             else if($_GET['menu']=='DetailProject'){
                include 'admin/result.php';
             }
             else if($_GET['menu']=='Table'){
                include 'admin/showProject.php';
             }
             else if($_GET['menu']=='Status'){
                include 'admin/Status.php';
             }
             else if($_GET['menu']=='StatusAdd'){
                include 'admin/StatusAdd.php';
             }
             else if($_GET['menu']=='Technology'){
                include 'admin/Technology.php';
             }
             else if($_GET['menu']=='TechnologyAdd'){
                include 'admin/TechnologyAdd.php';
             }
             else if($_GET['menu']=='IPM'){
                include 'admin/IPM.php';
             }
             else if($_GET['menu']=='IPMAdd'){
                include 'admin/IPMAdd.php';
             }
             else if($_GET['menu']=='Choice'){
                include 'admin/Choice.php';
             }
             else if($_GET['menu']=='ChoiceAdd'){
                include 'admin/ChoiceAdd.php';
             }
             else {
               include 'home.php';
             }
           }
           else if ($_SESSION['Status'] == 'Project') {
             // Addproject
             if($_GET['menu']=='Leader'){
               include 'project/add_project.php';
             }
             else if($_GET['menu']=='addproject'){
               include 'project/moc.php';
             }
             else if ($_GET['menu']=='complete') {
               include 'project/complete.php';
             }
             // Detail
             else if($_GET['menu']=='DetailProject'){
               include 'project/result.php';
             }
             // Home
             else if($_GET['menu']=='Home'){
               include 'project/index.php';
             }
             // Edit
             else if($_GET['menu']=='edit'){
               include 'project/edit.php';
             }
             else if($_GET['menu']=='editproject'){
                include 'project/mocedit.php';
              }
             else if($_GET['menu']=='addproject'){
               include 'project/moc.php';
             }
             else if($_GET['menu']=='Leader'){
               include 'project/add_project.php';
             }
             else if($_GET['menu']=='Detail'){
               include 'project/result.php';
             }
             // UpdateStatus
             else if($_GET['menu']=='updateStatus'){
               include 'project/updateStatus.php';
             }
             else if($_GET['menu']=='logout'){
               session_unset();
               header('Location: index.php');
             }
             else {
               include 'home.php';
             }
           }
           else if ($_SESSION['Status'] == 'MOC') {
             // Addproject
             if($_GET['menu']=='Leader'){
               include 'project/add_project.php';
             }
             else if($_GET['menu']=='addproject'){
               include 'project/moc.php';
             }
             else if ($_GET['menu']=='complete') {
               include 'project/complete.php';
             }
             // Edit
             else if($_GET['menu']=='edit'){
               include 'project/edit.php';
             }
             else if($_GET['menu']=='editproject'){
               include 'project/mocedit.php';
             }
             // UpdateStatus
             else if($_GET['menu']=='updateStatus'){
               include 'project/updateStatus.php';
             }
             // Home
             else if($_GET['menu']=='Home'){
               include 'project/index.php';
             }
             // Approve MOC
             else if($_GET['menu']=='ProjectApprove'){
               include 'moc/index.php';
             }
             else if($_GET['menu']=='Detail'){
               include 'moc/result.php';
             }
             // Detail
             else if($_GET['menu']=='DetailProject'){
               include 'project/result.php';
             }
             else if($_GET['menu']=='logout'){
               session_unset();
               header('Location: index.php');
             }
             else if ($_GET['menu']=='approveSuccess') {
               include 'approve/complete.php';
             }
             else {
               include 'home.php';
             }
           }
           else if ($_SESSION['Status'] == 'Approve') {
             // Addproject
             if($_GET['menu']=='Leader'){
               include 'project/add_project.php';
             }
             else if($_GET['menu']=='addproject'){
               include 'project/moc.php';
             }
             else if ($_GET['menu']=='complete') {
               include 'project/complete.php';
             }
             // Edit
             else if($_GET['menu']=='edit'){
               include 'project/edit.php';
             }
             else if($_GET['menu']=='editproject'){
               include 'project/mocedit.php';
             }
             // UpdateStatus
             else if($_GET['menu']=='updateStatus'){
               include 'project/updateStatus.php';
             }
             // Home
             else if($_GET['menu']=='Home'){
               include 'project/index.php';
             }
             // Approve
             else if($_GET['menu']=='ProjectApprove'){
               include 'approve/index.php';
             }
             else if($_GET['menu']=='Detail'){
               include 'approve/result.php';
             }
             // Detail
             else if($_GET['menu']=='DetailProject'){
               include 'project/result.php';
             }
             else if($_GET['menu']=='logout'){
               session_unset();
               header('Location: index.php');
             }
             else if ($_GET['menu']=='approveSuccess') {
               include 'approve/complete.php';
             }
             else {
               include 'home.php';
             }
           }
           if($_SESSION['Status'] == 'Manager'){
             // Addproject
             if($_GET['menu']=='Leader'){
               include 'project/add_project.php';
             }
             else if($_GET['menu']=='addproject'){
               include 'project/moc.php';
             }
             else if ($_GET['menu']=='complete') {
               include 'project/complete.php';
             }
             // Edit
             else if($_GET['menu']=='edit'){
               include 'project/edit.php';
             }
             else if($_GET['menu']=='editproject'){
               include 'project/mocedit.php';
             }
             // UpdateStatus
             else if($_GET['menu']=='updateStatus'){
               include 'project/updateStatus.php';
             }
             // Detail
             else if($_GET['menu']=='DetailProject'){
               include 'project/result.php';
             }
             // Approve MOC
             else if($_GET['menu']=='ProjectApprove'){
               include 'manager/index2.php';
             }
             else if($_GET['menu']=='Detail'){
               include 'manager/result.php';
             }
             else if($_GET['menu']=='logout'){
               session_unset();
               header('Location: index.php');
             }
             // Home
             else if($_GET['menu']=='Home'){
               include 'manager/index.php';
             }
             //Detail
             else if($_GET['menu']=='Detail'){
                include 'manager/result.php';
             }
             else if($_GET['menu']=='Table'){
                include 'manager/showProject.php';
             }
             else {
               include 'home.php';
             }
           }
         }
           else {
             include 'home.php';
           }

         ?>
       </div>
     <!-- /.container-fluid-->
     <!-- /.content-wrapper-->
     <footer class="sticky-footer">
       <div class="container">
         <div class="text-center">
           <small>Copyright © E-MOC 2017</small>
         </div>
       </div>
     </footer>
     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
       <i class="fa fa-angle-up"></i>
     </a>

 </body>
 </html>
