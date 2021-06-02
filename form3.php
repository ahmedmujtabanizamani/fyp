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
    
    //=======================  check if form 1 filled
   $sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		if(mysqli_fetch_assoc($run_Sql) > 0){
			$sql = "SELECT * FROM programs WHERE email = '$email'";
			$run_Sql = mysqli_query($con, $sql);
			if(mysqli_fetch_assoc($run_Sql) > 0){
				
				$sql = "SELECT * FROM contact_info WHERE email = '$email'";
					$run_Sql = mysqli_query($con, $sql);
					if(mysqli_fetch_assoc($run_Sql) > 0){
						header('Location: form4.php');
						exit();
					}
					
			}else{
				header('Location: form2.php');
				exit();
			}
		}else{
			header('Location: form1.php');
			exit();
		}
		
        //=========================   
}else{
    header('Location: login-user.php');
}
?>
<?php include 'form3DB.php'; ?>
<html>
	
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="flex.css">	
		<title>Form 3</title>
	</head>
	
	<body id="mybody" style="display:none;">
		<?php include "navbar1.php"; ?>
		<!-- form start -->
		<form action="" method="post" enctype="multipart/form-data">
			<div class="heading">
				<div>Contact info</div>
			</div>
			<!-- row 1 ----------------------------------->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Street Address
					</div>
					<div class="defin">	
						<input class="form-control" type="text" name="street" required >					
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						City/Province
					</div>			
					<div class="defin">	
						<input class="form-control" type="text" name="city_province" required >
					</div>
				</div>
			</div>
			<!-- Row 1  end ------------------------------------->

			<!-- Row 2 ----------------------------------------------------------->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Country
					</div>
					<div class="defin">	
						<input class="form-control" type="text" name="country" required >				
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Zip code
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="zipCode" required >
					</div>
				</div>
			</div>
			<!-- Row 2  end ------------------------------------->
			
			<!-- Row 3 ----------------------------------------------------------->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Phone #
					</div>
					<div class="defin">	
						<input class="form-control" type="number" name="phone" required >			
					</div>
				</div>
				<div class="flex-item">
					<div class="headin">
						Email
					</div>			
					<div class="defin">	
						<input class="form-control" type="email" class="input-text" name="cEmail" >
					</div>
				</div>
			</div>
			<!-- Row 3  end ------------------------------------->
			
			<div class="heading">
				<div>Social Links</div>
			</div>
			
			<!-- Row 4 ----------------------------------------------------------->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin">
						Facebook
					</div>
					<div class="defin">	
						<input class="form-control" type="text" name="facebook" >
					</div>
				</div>
				<div class="flex-item">
					<div class="headin">
						Whatsapp #
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="whatsapp">
					</div>
				</div>
			</div>
			<!-- Row 4  end ------------------------------------->
			
			<input id="saveSubmit" class="btn-lg btn-primary" type="submit" name="submit"value="SaveNext">
		</form>
		
		<script>
			var abody = document.getElementById("mybody");
			window.onload = function() 
			{ 
				setTimeout(function(){ abody.style.display = "block";  }, 500);
			}
		</script>
	</body>
</html>
