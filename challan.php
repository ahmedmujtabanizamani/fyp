<?php require_once "controllerUserData.php"; ?>
<?php
echo  "in doc";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
//session user check
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
            $sname = $fetch_info['name'];
        }else{
            header('Location: user-otp.php');
            exit();
        }
    }      
    
    //re generate challan
    
    if( $_GET['q'] == 'regen' ){
		echo "<script>alert(0);</script>";
		if(mysqli_fetch_assoc( mysqli_query( $con, "select status from challan where email='".$email."';" ) )['status'] == 'generated' ){
			if(mysqli_query($con, "delete from challan where email='".$email."';")){
				$_GET['q']='generate';
			}
		}
	}
    
    // generate challan
    
    if( $_GET['q'] == 'generate' ){
		
		echo "hi";
		$challanId = rand(99999999, 11111111);
		//=============================
		$sql = "insert into challan  (id, date, email, status) values (".$challanId.", now(), '".$email."', 'generated');";
		
		if( mysqli_query($con, $sql)){
			$challanStatus='generated';	
		}
		
	}
	//generate challan end ===================
	
	
	
	header('Location: dashboard.php');
    exit();
    //=============================
}else{
    header('Location: login-user.php');
}
?>
