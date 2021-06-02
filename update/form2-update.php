<!DOCTYPE html>
<html>
	
	<body>
		<script src="js/program_select.js">

		</script>
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
					
					<?php 
							//1 =========== list
						$programs1 = array("BSSE", "BSCS", "BSIT", "BBA", "BSEE" ); //suppose this is comming from an nationalities api
						$programs2 = array("BECE", "BEEE", "BSTC", "MBBS", "BDS");
					?>
					<div class="defin">
						<?php
						//2 ============ checkbox
							$checked = "";
							for($i=0; $i< count($programs1); $i++){
								$i_value = $programs1[$i];
								$checked = "";
								for($j=0; $j<count($program); $j++){
									$i_value == $program[$j][1] ? $checked = "checked":0; 
								}
								echo '<input type="checkbox" name="program[]" value="'.$i_value.'" onclick="checkBoxLimit()" '.$checked.' > '.strtoupper($i_value); 
								echo '<br />';
							}
						?>
							
					</div>
				</div>
				<div class="flex-item">
					<div class="headin">
						<div style="width:120px;" >&nbsp;</div>
					</div>
					<div class="defin">		
						<?php
						//2 ============ checkbox
							$checked = "";
							for($i=0; $i< count($programs2); $i++){
								$i_value = $programs2[$i];
								$checked = "";
								for($j=0; $j<count($program); $j++){
									$i_value == $program[$j][1] ? $checked = "checked":0; 
								}
								echo '<input type="checkbox" name="program[]" value="'.$i_value.'" onclick="checkBoxLimit()" '.$checked.' > '.strtoupper($i_value); 
								echo '<br />';
							}
						?>
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
						<input class="form-control" type="text" name="name" value="<?php echo $edu_info[$edu_info_count++]; ?>" required="required">
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Date
					</div>
					<div class="defin">		
						<input class="form-control" type="date" name="lastEduDate" value="<?php echo $edu_info[$edu_info_count++]; ?>" required="required">
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
						<input class="form-control" type="text" name="lastEduCity" value="<?php echo $edu_info[$edu_info_count++]; ?>" required="required" >

					</div>
				</div>
					
				<div class="flex-item">
					<div class="headin required">
						Country
					</div>			
					<div class="defin">								
						<input class="form-control" type="text" name="lastEduCountry" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >
					</div>
				</div>
			</div>
			
<!--
			row 3 ended
-->
			<!-- Row 4 ----------------------------------------------- -->
			<div class="heading">
				<div>Secondary Education</div>
			</div>
			
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Year of Completion
					</div>
					<div class="defin">
						<input class="form-control" type="date" name="matricDate" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Name Of Board
					</div>			
					<div class="defin">	
						<input class="form-control" type="text" name="matricBoard" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >							
					</div>
				</div>
			</div>
			<!-- row 4 ended ------------------>
			
			<!-- row 5 ------------------>
			
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Total Marks
					</div>
					<div class="defin">						
						<input  class="form-control" type="number" name="matricTotalMarks" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Obtained Marks
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="matricObtainedMarks" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >					
					</div>
				</div>
			</div>
			<!-- row 5 ended ------------------>
			
			<!-- row 6 -------- ------------------>
			
			<div class="heading">
				<div>Higher Secondary Education</div>
			</div>
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Year of Completion
					</div>
					<div class="defin">						
						<input class="form-control" type="date" name="interDate" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Name Of Board
					</div>			
					<div class="defin">	
						<input class="form-control" type="text" name="interBoard" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >				
					</div>
				</div>
			</div>
			<!-- row 6 ended ------------------>
			
			<!-- row 7 ------------------>
			<div class="flex-container">
				<div class="flex-item">
					<div class="headin required">
						Total Marks
					</div>
					<div class="defin">						
						<input  class="form-control" type="number" name="interTotalMarks" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Obtained Marks
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="interObtainedMarks" value="<?php echo $edu_info[$edu_info_count++]; ?>" required >					
					</div>
				</div>
			</div>
			<!-- row 7 ended ------------------>
			
			<input id="saveSubmit" class="btn btn-primary btn-lg" type="submit" name="saveNext2" value="update">
		</form>
		

	</body>
</html>
		
