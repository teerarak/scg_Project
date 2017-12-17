<?php session_start();
	require_once("connect.php");
	
	$Username = mysqli_real_escape_string($con,$_POST['Username']);
	$Password = mysqli_real_escape_string($con,$_POST['Password']);

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
			

			echo '<script>window.location="index.php";</script>' ;
        

		}
	else
		{
			//*** Go to Main page
			header("location:page1.php");
		}

			
	
	mysqli_close($con);
?>