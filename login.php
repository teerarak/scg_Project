
<?php

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $password = $_POST['password'];
        $sql_username = ' SELECT * FROM employee WHERE Username = "'.$username.'" AND Password = "'.$password.'" ';
        $query_username = $connect->query($sql_username);
        if ($result_username = $query_username->fetch_assoc()){
            $_SESSION['User_ID'] = $result_username['User_ID'];
            $_SESSION['Name'] = $result_username['Name'];
            $_SESSION['Status'] = $result_username['Status'];
            echo '<div class="alert alert-success" role="alert">
            ล็อคอินสำเร็จแล้ว!
          </div>';
          header('Location: index.php');
        }
        else {
            echo '<div class="alert alert-warning" role="alert">
            Username หรือ Password ไม่ถูกต้อง!
          </div>';
        }
    }

?>
<form method="POST">
<table>
    <tr>
        <td>Username </td>
        <td><input type="text" name="username" class="form-control" required></td>

    </tr>
    <tr>
        <td>Password </td>
        <td><input type="password" name="password" class="form-control" required></td>

    </tr>
    <tr>
        <td colspan="2"><center><button class="btn btn-primary">Login</button></center></td>
    </tr>

</table>

</form>
