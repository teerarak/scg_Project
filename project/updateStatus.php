<?php
  $id_project = $_GET['Project_ID'];
  $Status = $_GET['Status'];
    $sql_update_approve = 'UPDATE project SET Status_ID = "'.$Status.'" WHERE Project_ID = "'.$id_project.'" ';
    if ($result_update_approve = $connect->query($sql_update_approve)) {
      echo "<script type='text/javascript'>
              alert('สำเร็จ');
            </script>
          ";
      header('Location:?menu=Home');
    }
 ?>
