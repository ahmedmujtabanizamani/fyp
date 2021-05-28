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
			header('Location: form2.php');
			exit();
		}
        //=========================   
}else{
    header('Location: login-user.php');
}
?>
<?php include 'form1DB.php'; ?>
<html>
	<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

		<link rel="stylesheet" href="form.css">	
		<title>Form 1</title>
	<script>
		var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
		};
</script>
	</head>
	<?php include "navbar1.php"; ?>
	
	<body style="display:none;" id="mybody">
		<!-- form start -->
		<form class="table" action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td colspan="3">
						<div class="heading">
							Personal Info
						</div>
					</td>
				</tr>
				<!-- picture upload row  start -->
				
				<tr>
					<td class="required label">	
						 Personal Photo
					</td>
					<td>	
						 <img id="output" height="100px" src="images/gm.png">
					</td>
					<td>
						Please upload your recent full-faced passport size photo (*.jpg, *.jpeg) : <br>
						<br>
						<input value="" type="file" name="pics" onchange="loadFile(event);">
						
					</td>
				</tr>
			</table>
				<!-- picture upload row  end -->
				
				<!-- basic info start -->
			<table>
				<!-- Row 1 -->
				<tr>		
					<td class="required label">	
						Name
					</td>
					<td>
						<input class="input-text form-control" type="text" name="name" required="required">
					</td>
					<td class="required label form-group">	
						Surname
					</td>
					<td>
						<input class="input-text form-control" type="text" name="surname" required="required">
					</td>
				</tr>
				<!-- Row 2 -->
				<tr>
					<td class="required label">	
						Father's Name
					</td>
					<td>
						<input class="input-text form-control" type="text" name="fathername" required="required" >
					</td>
					<td class="required label">	
						Gender
					</td>
					<td class="">
						<input type="radio" name="gender" value="m" required > Male
						<input type="radio" name="gender" value="f"> Female
					</td>
				</tr>
				<!-- Row 3 -->
				<tr>
					<td class="required label">	
						Martial Status
					</td>
					<td>
						<input type="radio" name="married" value="s" required > Unmarried
						<input type="radio" name="married" value="m" > Married
					</td>
					<td class="required label">	
						Nationality
					</td>
					<td>
						<select name="nationality" class="form-select">
							<option value="pakistani">Pakistani</option>
							<option value="afghanistani">Afghanistani</option>
							<option value="american">American</option>
						</select>
					</td>
				</tr>
				<!-- Row 4 -->
				<tr>
					<td class="required label">	
						Birth Date
					</td>
					<td>
						<input class="form-control" type="date" name="birthdate" required="required">
					</td>
					<td class="required label">	
						Country or region of birth
					</td>
					<td>
						<select name="birthcountry" class="form-select">
							<option value="Pakistan">Pakistan</option>
							<option value="afghanistan">Afghanistan</option>
							<option value="america">America</option>
						</select>
					</td>
				</tr>
				<!-- Row 5 -->
				<tr>
					<td class="required label">	
						Place of Birth<br><sub>(City, Province)</sub>
					</td>
					<td>
						<input class="input-text form-control" type="text" name="birthplace" required="required">
					</td>
					<td class="required label">	
						Native Language
					</td>
					<td>
						<select name="language" class="form-select">
							<option value="urdu">Urdu</option>
							<option value="sindhi">Sindhi</option>
							<option value="english">English</option>
						</select>
					</td>
				</tr>
				<!-- Row 6 -->
				<tr>
					<td class="required label">	
						Religion
					</td>
					<td>
						<select name="religion" class="form-select">
							<option value="islam">Islam</option>
							<option value="hindu">Hinduism</option>
							<option value="budha">Budhapist</option>
						</select>
					</td>
					<td class="label">	
						Blood Group
					</td>
					<td>
						<select name="blood" class="form-select">
							<option value="o+">O+</option>
							<option value="o-">O-</option>
							<option value="a+">A+</option>
							<option value="a-">A-</option>
							<option value="b+">B+</option>
							<option value="b-">B-</option>
							<option value="ab+">AB+</option>
							<option value="ab-">AB-</option>
						</select>
					</td>
				</tr>
			</table>	
			<table>
				<tr>
					<td colspan="4">
						<!-- National info -->
						<div class="heading">
							National Identification
						</div>
					</td>
				</tr>
				<!-- row 1 -->
				<!-- row 2 -->
				<tr>
					<td class="required label">
						CNIC #
					</td>
					<td>
						<input class="input-text form-control" type="number" name="cnic" min="1000000000000" max="9999999999999" required >
					</td>
					<td class="required label">
						ISSUE Date
					</td>
					<td>
						<input class="form-control" type="date" name="cnicissuedate" required="required">
					</td>
				</tr>
				<!-- row 3 -->
				<tr>
					<td class="required label">
						ISSUE Place
					</td>
					<td colspan="3">
						<input class="input-text form-control" type="text" name="cnicissueplace" required="required">
					</td>
				</tr>
			</table>
			<input class="btn btn-lg" id="saveSubmit" type="submit" name="saveNext" value="save next">
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
