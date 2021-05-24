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
		
		//============== basic info data
		
		$sql = "SELECT * FROM basic_info WHERE email = '$email'";
		$result = mysqli_fetch_assoc(mysqli_query($con, $sql));
		$pic = 'images/'.$email.'/'.$result["photo"];
		$name=$result["name"];
		$surname = $result["surname"];
		$fathername = $result["fathername"];
		$gender=$result["gender"] == 'm'?'Male':'Female';
		$married = $result["married"] == 's'?'Single':'Married';
		$nationality = $result["nationality"];
		$birthdate = $result["birthdate"];
		$birthcountry = $result["birthcountry"];
		$birthplace = $result["birthplace"];
		$language = $result["language"];
		$religion = $result["religion"];
		$blood = $result["blood"];
		$cnic = $result["cnic"]; $cnic = substr($cnic,0,5).'-'.substr($cnic,5,7).'-'.substr($cnic,12,1);
		$cnicissuedate = $result["cnicissuedate"];
		$cnicissueplace = $result["cnicissueplace"];
		
		// edu info data
		
		$sql = "SELECT * FROM programs WHERE email = '$email'";
		$queryResult = mysqli_query($con, $sql);
		$programs = "<td colspan=2>";
		while($result = mysqli_fetch_assoc($queryResult) )
		{
			$programs .= '<input type="radio"  checked >'.$result["program"].'<br>';
		}
		$programs .= '</td>';
		
		// programs
		
		$sql = "SELECT * FROM edu_info WHERE email = '$email'";
		$queryResult = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($queryResult);
		
		$prevEdu = array(
		$result["prevEduName"], 
		$result["prevEduDate"], 
		$result["prevEduCity"], 
		$result["prevEduCountry"], 
		$result["matricDate"], 
		$result["matricBoard"], 
		$result["matricTotalMarks"], 
		$result["matricObtainedMarks"], 
		$result["interDate"], 
		$result["interBoard"], 
		$result["interTotalMarks"], 
		$result["interObtainedMarks"]
		);
		$i = 0;
		
		//====================== contact info
		
		$sql = "SELECT * FROM contact_info WHERE email = '$email'";
		$queryResult = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($queryResult);
		
		$contactInfo = array(
			$result["street"],
			$result["city_province"],
			$result["country"], 
			$result["zipCode"], 
			$result["phone"],
			$result["cEmail"],
			$result["facebook"],
			$result["whatsapp"]
		);
		$j = 0;
		
		//= ============================= docs info
		
		$sql = "SELECT * FROM docs_info WHERE email = '$email'";
		$queryResult = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($queryResult);
		
		$docs = array("matricCert", "interCert", "matricMark", "interMark");
		$docsHtml = "<td colspan=2>";
		$docsInfo = array(
			$result[$docs[0]],
			$result[$docs[1]],
			$result[$docs[2]],
			$result[$docs[3]]
		);
		
		for( $k = 0; $k<4; $k+=1 )
		{
			if( $result[$docs[$k]] != '$' )
			{
				$docsHtml .= '<input class="" type="radio" checked readonly ><a href="'.'documents/'.$email.'/'.$docs[$k].'.'.$result[$docs[$k]].'">'.$docs[$k].'</a><br>';
			}
		}
		$docsHtml .= "</td>";

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


//===================
	
    
?>
<html>
	<head>
		    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<link rel="stylesheet" href="form.css">	
		<title>Application</title>

	</head>
	
	<body>
		<div id="printable">
		<!-- form start -->
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
					<td width=100px >	
						<img id="output" height="100px" src="<?php echo $pic; ?>">
					</td>
					<td class="label">	
						<h3 height="100%" class="heading">Application Form Isra University<br>Hyderabad</h3>
					</td>
				</tr>
				
			</table>
				<!-- picture upload row  end -->
				
				<!-- basic info start -->
			<table>
				<!-- Row 1 -->
				<tr>		
					<td class="label">	
						Name
					</td>
					<td>
						<input value="<?php echo $name; ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">	
						Surname
					</td>
					<td>
						<input value="<?php echo $surname; ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
				<!-- Row 2 -->
				<tr>
					<td class="label">	
						Father's Name
					</td>
					<td>
						<input value="<?php echo $fathername; ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">	
						Gender
					</td>
					<td class="">
						<input value="<?php echo $gender; ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
				<!-- Row 3 -->
				<tr>
					<td class="label">	
						Martial Status
					</td>
					<td>
						<input value="<?php echo $married; ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">	
						Nationality
					</td>
					<td>
						<input value="<?php echo ucfirst($nationality); ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
				<!-- Row 4 -->
				<tr>
					<td class="label">	
						Birth Date
					</td>
					<td>
						<input value="<?php echo $birthdate; ?>" class="form-control" type="date" readonly>
					</td>
					<td class="label">	
						Country or region of birth
					</td>
					<td>
						<input value="<?php echo ucfirst($birthcountry); ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
				<!-- Row 5 -->
				<tr>
					<td class="label">	
						Place of Birth<br><sub>(City, Province)</sub>
					</td>
					<td>
						<input value="<?php echo ucfirst($birthplace); ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">	
						Native Language
					</td>
					<td>
						<input value="<?php echo ucfirst($language); ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
				<!-- Row 6 -->
				<tr>
					<td class="label">	
						Religion
					</td>
					<td>
						<input value="<?php echo ucfirst($religion); ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">	
						Blood Group
					</td>
					<td>
						<input value="<?php echo strtoupper($blood); ?>" class="form-control" type="text" readonly >
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
				<!-- row  -->
		
				<tr>
					<td class="label">
						CNIC #
					</td>
					<td><!--41103-6043610-7-->
						<input value="<?php echo $cnic; ?>" class="form-control" type="text" readonly >
					</td>
					<td class="label">
						ISSUE Date
					</td>
					<td>
						<input value="<?php echo $cnicissuedate; ?>" class="form-control" type="date"  readonly >
					</td>
				</tr>
				<!-- row 3 -->
				<tr>
					<td class="label">
						ISSUE Place
					</td>
					<td colspan="3">
						<input value="<?php echo $cnicissueplace; ?>" class="form-control" type="text" readonly >
					</td>
				</tr>
			</table>
			
			<!------------------------------------------- form 1 end  ----------------------------------------------------------------->
			
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
						<td class="label">	
							Programs
						</td>
						<?php echo $programs; ?>
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
						<td class="label">	
							Last Institute Attended Name
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">	
							Date
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="date"  readonly >
						</td>
					</tr>
					<!-- Row 2 -->
					<tr>
						<td class="label">	
							City
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">	
							Country
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
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
						<td class="label">
							Year of Completion
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" readonly type="date" >
						</td>
						<td class="label">
							Name Of Board
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
					<!-- row 3 -->
					<tr>
						<td class="label">
							Total Marks
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">
							Obtained Marks
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
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
						<td class="label">
							Year of Completion
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" readonly type="date" >
						</td>
						<td class="label">
							Name Of Board
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
					<!-- row 3 -->
					<tr>
						<td class="label">
							Total Marks
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">
							Obtained Marks
						</td>
						<td>
							<input value="<?php echo $prevEdu[$i];$i+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
				</table>
				
				<!------------------------------------------------- form 2 end --------------------------------------------------->
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
						<td class="label">	
							Street Address
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">	
							City/Province
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
					<!-- Row 2 -->
					<tr>
						<td class="label">	
							Country
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">	
							Zip code
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
					<!-- Row 3 -->
					<tr>
						<td class="label">	
							Phone #
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
						<td class="label">	
							Email
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
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
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>	
					<tr>
						<td>	
							Whatsapp #
						</td>
						<td>
							<input value="<?php echo $contactInfo[$j]; $j+=1; ?>" class="form-control" type="text" readonly >
						</td>
					</tr>
				</table>
				
				<!-------------------- form 3 end here --------------------------------------------------------->
			
				<table>
					<tr>
						<td colspan="3">
							<div class="heading">
								Documents Submitted
							</div>
						</td>
					</tr>
					<!-- pogram select row  start -->
					
					<tr>
						<td class="label">	
							Documents
						</td>
						<?php echo $docsHtml; ?>
					</tr>
				</table>
					<!-- program select row  end -->
					
		</div>
		<button class="btn-general" onclick="this.style.display='none'; window.print(document.getElementById('printable')); this.style.display = 'block';">print</button>
	</body>

</html>
