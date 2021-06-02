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
					//===
					$sql = "SELECT * FROM docs_info WHERE email = '$email'";
					$run_Sql = mysqli_query($con, $sql);
					if(mysqli_fetch_assoc($run_Sql) > 0){
						header('Location: dashboard.php');
						exit();
					}
					//===
					
				}
				else
				{
					header('Location: form3.php');
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
<?php include 'form4DB.php'; ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="form.css">	
		<title>Form 4</title>
	</head>
	
	<body id="mybody" style="display:none;">
		<?php include "navbar1.php"; ?>
		<!-- form start -->
		<form action="" method="post" enctype="multipart/form-data">
			
		
			<table>
				<!-- Row 1 -->
				<tr>
					<td colspan="2">
						<div class="heading">
							Required Documents
					</td>
					
				</tr>
				<tr>
					<td colspan="2">
						<p class="required">please upload following documents in pdf or jpg (jpeg) format.</p>
					</td>
				</tr>
				<tr>
					<td class="label">	
						Matric Certificate
					</td>
					<td>
						<input class="input-text" type="file" name="matricCert" >
					</td>
				</tr>
				<tr>
					<td class="label">	
						Inter Certificate
					</td>
					<td>
						<input class="input-text" type="file" name="interCert" >
					</td>
				</tr>
				
				<tr>
					<td class="required label">	
						matric Marksheet
					</td>
					<td>
						<input class="input-text" type="file" name="matricMark" required >
					</td>
				</tr>
				
				<tr>
					<td class="required label">	
						Inter Marksheet
					</td>
					<td>
						<input class="input-text" type="file" name="interMark" required="required">
					</td>
				</tr>
			</table>	
			<input id="saveSubmit" class="btn-lg btn-primary" type="submit" name="submit" value="submit">
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
