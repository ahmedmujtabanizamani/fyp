<!DOCTYPE html>
<?php include "user.php" ?>
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
            }
        }else{
            header('Location: user-otp.php');
        }
	}
        //=======================  check if form 1 filled
        $sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		if(mysqli_fetch_assoc($run_Sql) > 0){
			
			$sql = "SELECT * FROM programs WHERE email = '$email'";
			$run_Sql = mysqli_query($con, $sql);
			if(mysqli_fetch_assoc($run_Sql) > 0){
				header('Location: form3.php');
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
<?php include 'form2DB.php'; ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link rel="stylesheet" href="flex.css">	
		<title>Form 2</title>

	</head>
	<script>
		function checkBoxLimit() {
			var checkBoxGroup = document.forms['form2']['program[]'];			
			var limit = 3;
			for (var i = 0; i < checkBoxGroup.length; i++) 
			{
				checkBoxGroup[i].onclick = function() {
					var checkedcount = 0;
					for (var i = 0; i < checkBoxGroup.length; i++) {
						checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
					}
					if (checkedcount > limit) {
						console.log("You can select maximum of " + limit + " programs.");
						alert("You can select maximum of " + limit + " programs.");						
						this.checked = false;
					}
				}
			}
		}
	
	</script>
	
	<body id="mybody" style="display:none;">
		<!-- form start -->
		<?php include "navbar1.php"; ?>
		<form name=form2 action="" method="post" enctype="multipart/form-data">
		
			<div class="heading">
				<div>StudyPlan in Hyderabad Campus</div>						
			</div>
			
			<!-- row 1 =============== -->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						please choose <br>atmost 3 programs
					</div>
					<div class="defin">
						<input type="checkbox" name="program[]" value="BSSE" onclick="checkBoxLimit()" > BS <sub>( Software Engineer )</sub>
						<br>
						<input type="checkbox" name="program[]" value="BSCS" onclick="checkBoxLimit()" > BS <sub>( Computer Science )</sub>
						<br>
						<input type="checkbox" name="program[]" value="BSIT" onclick="checkBoxLimit()" > BS <sub>( Information Technology )</sub>
						<br>
						<input type="checkbox" name="program[]" value="BBA" onclick="checkBoxLimit()" > BBA
						<br>
						<input type="checkbox" name="program[]" value="BSEE" onclick="checkBoxLimit()" > BS <sub>( Electronics Engineer )</sub>		
					</div>
				</div>
					
				<div class="flex-item">
					<div class="headin">
						<div style="width:120px;" >&nbsp;</div>
					</div>
							
					<div class="defin">		
						<input type="checkbox" name="program[]" value="BECE" onclick="checkBoxLimit()" > BE <sub>( Civil )</sub>
						<br>
						<input type="checkbox" name="program[]" value="BEEE" onclick="checkBoxLimit()" > BE <sub>( Electrical )</sub>
						<br>
						<input type="checkbox" name="program[]" value="BSTC" onclick="checkBoxLimit()" > BS <sub>( Telecommunication )</sub>
					</div>
				</div>
			</div>
			<!-- row 1 end ---------------------->
			
			<!-- row 2 -------------------------------------->
			<div class="heading">
				<div>Previous Education</div>
			</div>
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Last Institute <br>Attended Name
					</div>
					<div class="defin">
						<input class="form-control" type="text" name="name" required="required">
					</div>
				</div>
					
				<div class="flex-item">
					<div class="headin required">
						Date
					</div>
							
					<div class="defin">		
						<input class="form-control" type="date" name="lastEduDate" required="required">
					</div>
				</div>
			</div>
			<!-- Row 2 ended -->
			
			
			<!-- Row 3 ----------------------------------------------- -->
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						City
					</div>
					<div class="defin">
						<input class="form-control" type="text" name="lastEduCity" required="required" >

					</div>
				</div>
					
				<div class="flex-item">
					<div class="headin required">
						Country
					</div>			
					<div class="defin">								
						<input class="form-control" type="text" name="lastEduCountry" required >
					</div>
				</div>
			</div>
				
			<table>
				<tr>
					<td colspan="4">
						<!-- National info -->
						<div class="heading">
							Secondary Education
						</div>
					</td>
				</tr>
				<!-- row 1 -->
				<!-- row 2 -->
				<tr>
					<td class="required label">
						Year of Completion
					</td>
					<td>
						<input type="date" name="matricDate" required >
					</td>
					<td class="required label">
						Name Of Board
					</td>
					<td>
						<input class="input-text" type="text" name="matricBoard" required >
					</td>
				</tr>
				<!-- row 3 -->
				<tr>
					<td class="required label">
						Total Marks
					</td>
					<td>
						<input type="number" name="matricTotalMarks" required >
					</td>
					<td class="required label">
						Obtained Marks
					</td>
					<td>
						<input type="number" name="matricObtainedMarks" required >
					</td>
				</tr>
				<!-- Inter marks -->
				<tr>
					<td colspan="4">
						<!-- National info -->
						<div class="heading">
							Higher Secondary Education
						</div>
					</td>
				</tr>
				<!-- row 1 -->
				<!-- row 2 -->
				<tr>
					<td class="required label">
						Year of Completion
					</td>
					<td>
						<input type="date" name="interDate" required >
					</td>
					<td class="required label">
						Name Of Board
					</td>
					<td>
						<input class="input-text" type="text" name="interBoard" required >
					</td>
				</tr>
				<!-- row 3 -->
				<tr>
					<td class="required label">
						Total Marks
					</td>
					<td>
						<input type="number" name="interTotalMarks" required >
					</td>
					<td class="required label">
						Obtained Marks
					</td>
					<td>
						<input type="number" name="interObtainedMarks" required >
					</td>
				</tr>
			</table>
			
			<input id="saveSubmit" type="submit" name="saveNext2" value="save next">
			
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
