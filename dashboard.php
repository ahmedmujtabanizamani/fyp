<!DOCTYPE html>

<?php include "user.php"; ?>
<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
                exit();
            }
        }else{
            header('Location: user-otp.php');
            exit();
        }
    }      
    
    //=============================
    $sql = "SELECT * FROM submitted WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($run_Sql);
    if( $result > 0){
		$submitted = true;
		$status = $result["status"];
		
		$sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$result = mysqli_fetch_assoc(mysqli_query($con, $sql));
		$pic = 'images/'.$email.'/'.$result["photo"];
		$name=$result["name"];
		
		
		
		//================== after submittion action here
		
		
		include "deleteApplication.php";
		
		//= === = = = =  = = = = =  = = =  = 
	}else{
		$submitted = false;
	}
    //=============================
}else{
    header('Location: login-user.php');
}
?>
<html>
	<head>
		<link rel="stylesheet" href="form.css">	
		<title>Admission Application</title>
	</head>
	
	<body>
		
		<div class="heading">
			Welcome!
		</div>
		
		<!-- info card -->
		<?php
		if($submitted){
			echo '<div class="card">';
			echo '	<img src="'.$pic.'" width="100px;">';
			echo '	<h4> '.$name.'</h4>';
			echo '	<h4> '.$status.'</h4>';
			echo '</div>';
		}
		?>
		
		<?php if(!$submitted){echo '<button class="btn-general" onclick="window.location.href = '."'form1.php'".';">Apply Application</button>';} ?>
		<br>
		<?php if($submitted == true){echo '<form method="post" action="app-view.php"> <input type="submit" name="" value="View Application" class="btn-general" /> </form>';} ?>
		<br>
		<?php if($submitted == true && $status == "submitted"){echo '<form method="post" action=""> <input type="submit" name="deleteApplication" value="Delete Application" class="btn-general" /> </form>';} ?>
		<br>
		<?php if($submitted == true && $status == "accepted"){echo '<form method="post" action="challan.php"> <input type="submit" value="Download Chalan" class="btn-general" /> </form>';} ?>
	</body>
</html>
