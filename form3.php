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
		<link rel="stylesheet" href="form.css">	
		<title>Form 3</title>
	</head>
	
	<body id="mybody" style="display:none;">
		<?php include "navbar1.php"; ?>
		<!-- form start -->
		<form action="" method="post" enctype="multipart/form-data">
			
		
			<table>
				<!-- Row 1 -->
				<tr>
					<td colspan="4">
						<div class="heading">
							Contact info
						</div>
					</td>
				</tr>
				<tr>		
					<td class="required label">	
						Street Address
					</td>
					<td>
						<input class="input-text" type="text" name="street" required="required">
					</td>
					<td class="required label">	
						City/Province
					</td>
					<td>
						<input class="input-text" type="text" name="city_province" required="required">
					</td>
				</tr>
				<!-- Row 2 -->
				<tr>
					<td class="required label">	
						Country
					</td>
					<td>
						<input class="input-text" type="text" name="country" required="required" >
					</td>
					<td class="required label">	
						Zip code
					</td>
					<td>
						<input type="number" name="zipCode" required >
					</td>
				</tr>
				<!-- Row 3 -->
				<tr>
					<td class="required label">	
						Phone #
					</td>
					<td>
						<input type="number" name="phone" required >
					</td>
					<td class="label">	
						Email
					</td>
					<td>
						<input type="email" class="input-text" name="cEmail" >
					</td>
				</tr>
			</table>
			<table>
				<!-- Row 1 -->
				<tr>
					<td colspan="2">
						<div class="heading">
							Social Links
						</div>
					</td>
				</tr>
				<tr>		
					<td >	
						Facebook
					</td>
					<td>
						<input class="input-text" type="text" name="facebook" >
					</td>
				</tr>	
				<tr>
					<td>	
						Whatsapp #
					</td>
					<td>
						<input class="input-text" type="number" name="whatsapp">
					</td>
				</tr>
			</table>
				
			<input id="saveSubmit" type="submit" name="submit"value="SaveNext">
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
