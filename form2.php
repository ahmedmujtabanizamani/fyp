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
		<link rel="stylesheet" href="form.css">	
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
	
	<body>
		<!-- form start -->
		<form name=form2 action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td colspan="3">
						<div class="heading">
							StudyPlan in Hyderabad Campus
						</div>
					</td>
				</tr>
				<!-- pogram select row  start -->
				
				<tr>
					<td class="required label">	
						 please choose atmost 3 programs
					</td>
					<td colspan="2">	
						 <input type="checkbox" name="program[]" value="BSSE" onclick="checkBoxLimit()" > BS ( Software Engineer )
						 <br>
						 <input type="checkbox" name="program[]" value="BSCS" onclick="checkBoxLimit()" > BS ( Computer Science )
						 <br>
						 <input type="checkbox" name="program[]" value="BSIT" onclick="checkBoxLimit()" > BS ( Information Technology )
						 <br>
						 <input type="checkbox" name="program[]" value="BBA" onclick="checkBoxLimit()" > BBA
						 <br>
						 <input type="checkbox" name="program[]" value="BSEE" onclick="checkBoxLimit()" > BS ( Electronics Engineer )
						 <br>
						 <input type="checkbox" name="program[]" value="BECE" onclick="checkBoxLimit()" > BE ( Civil )
						 <br>
						 <input type="checkbox" name="program[]" value="BEEE" onclick="checkBoxLimit()" > BE ( Electrical )
						 <br>
						 <input type="checkbox" name="program[]" value="BSTC" onclick="checkBoxLimit()" > BS ( Telecommunication )
					</td>
				</tr>
			</table>
				<!-- program select row  end -->
				
				<!-- basic info start -->
			<table>
				<tr>
					<td colspan="4">
						<div class="heading">
							Previous Education
						</div>
					</td>
				</tr>
				<!-- Row 1 -->
				<tr>		
					<td class="required label">	
						Last Institute Attended Name
					</td>
					<td>
						<input class="input-text" type="text" name="name" required="required">
					</td>
					<td class="required label">	
						Date
					</td>
					<td>
						<input class="input-text" type="date" name="lastEduDate" required="required">
					</td>
				</tr>
				<!-- Row 2 -->
				<tr>
					<td class="required label">	
						City
					</td>
					<td>
						<input class="input-text" type="text" name="lastEduCity" required="required" >
					</td>
					<td class="required label">	
						Country
					</td>
					<td>
						<input class="input-text" type="text" name="lastEduCountry" required >
					</td>
				</tr>
			</table>	
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

	</body>
</html>
