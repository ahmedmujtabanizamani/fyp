<form class="table" action="" method="post" enctype="multipart/form-data">
			<div class="heading">
				<div>
					Personal Info
				</div>
							
			</div>
			<!-- ================================================================================================================= -->
		
				<!-- picture upload row  start -->
				
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Personal Photo
							<br><br>
							passport size photo (*.jpg, *.jpeg) :
						</div>
						<div class="defin cm">
							<img id="output" class="" height="100px" src="<?php echo 'images/'.$basic_info[$basic_info_count++].'/'.$basic_info[$basic_info_count++]; ?>">
						</div>
					</div>
					
					<div class="flex-item">
						<div class="headin">
							<label class="btn-upload btn btn-primary">
								<input type="file" name="pics" onchange="loadFile(event);">
								<span>Upload</span>
							</label>
						</div>
						<div class="defin">
							
						</div>
					</div>
				</div>

				<!-- picture upload row  end -->
				
				<!-- basic info start -->
				<!-- Row 1 -->
				<div class="flex-container">
					<div class="flex-item">
						
						<div class="headin required">	
							Name
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="name" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required">
						</div>
					</div>		
					<div class="flex-item">
						<div class="headin required">	
							Surname
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="surname" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required">
						</div>
					</div>
				</div>	
				
				<!-- Row 2 -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="required headin">	
							Father's Name &nbsp;
						</div>
						<div class="defin">
							<input class="input-text form-control" type="text" name="fathername" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required" >
						</div>
					</div>
					<div class="flex-item">
						<div class="required headin">	
							Gender
						</div>
						&nbsp;&nbsp;
						<div class="defin">
							<?php
								
							if( $basic_info[$basic_info_count++] == "m" )
							{
								echo '<input type="radio" name="gender" value="m" checked > Male';
								echo '<input type="radio" name="gender" value="f"> Female';
							}else{
								echo '<input type="radio" name="gender" value="m" > Male';
								echo '<input type="radio" name="gender" value="f" checked > Female';
							}
							
							
							?>
						</div>
					</div>
				</div>
				<!-- ========================================== -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Martial Status
						</div>
						<div class="defin">
							<?php 
								if( $basic_info[$basic_info_count++] == "s" ){
									echo '<input type="radio" name="married" value="s" checked required > Unmarried';
									echo '<input type="radio" name="married" value="m" > Married';
								}else{
									echo '<input type="radio" name="married" value="s" required > Unmarried';
									echo '<input type="radio" name="married" value="m" checked > Married';
								}
							?>
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Nationality
						</div>
						
						<?php 
							$nationalities = array("pakistani", "afghanistani", "american", "iraqi", "turkish"); //suppose this is comming from an nationalities api
						?>
						<div class="defin">
							<select name="nationality" class="form-select" >
								<?php
									$i_cmp = $basic_info[$basic_info_count++];
									$checked = "";
									for($i=0; $i< count($nationalities); $i++){
			
										$i_value = $nationalities[$i];
										$i_value == $i_cmp ? $checked = "selected": $checked = "";
										echo '<option value="'.$i_value.'" '.$checked.'>'.ucfirst($i_value).'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</div>
			
			
				<!-- Row 3 ==========================================================================================-->
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Birth Date
						</div>
						<div class="defin">
							<input class="form-control" type="date" name="birthdate" value="<?php echo $basic_info[$basic_info_count++]; ?>"  required="required">
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Country or region of birth &nbsp;
						</div>
						<div class="defin">
							<?php 
								$nationalities = array("pakistan", "afghanistan", "america", "iraq", "turkey"); //suppose this is comming from an nationalities api
							?>
							<select name="birthcountry" class="form-select">
								<?php
									$i_cmp = $basic_info[$basic_info_count++];
									$checked = "";
									for($i=0; $i< count($nationalities); $i++){
			
										$i_value = $nationalities[$i];
										$i_value == $i_cmp ? $checked = "selected": $checked = "";
										echo '<option value="'.$i_value.'" '.$checked.'>'.ucfirst($i_value).'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<!-- Row 4 -->
				
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Place of Birth<br><sub>(City, Province)</sub>
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="birthplace" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required">
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Native Language
						</div>
						<div class="defin">
							<?php 
							//1 =========== list
								$languages = array("sindhi", "urdu", "pashto", "siraiqi", "punjabi", "english"); //suppose this is comming from an nationalities api
							?>
							<select name="language" class="form-select">
								<?php
								//2 ============ list
									$i_cmp = $basic_info[$basic_info_count++];
									$checked = "";
									for($i=0; $i< count($languages); $i++){
										$i_value = $languages[$i];
										$i_value == $i_cmp ? $checked = "selected": $checked = "";
										echo '<option value="'.$i_value.'" '.$checked.'>'.ucfirst($i_value).'</option>';
									}
								?>
						</select>
						</div>
					</div>
				</div>
				
				<!-- Row 5 -->
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							Religion
						</div>
						<div class="defin">
							
							<?php 
							//1 =========== list
								$religions = array("islam", "hindu", "cristian", "budhapist"); //suppose this is comming from an nationalities api
							?>
							<select name="religion" class="form-select">
								<?php
								//2 ============ list
									$i_cmp = $basic_info[$basic_info_count++];
									$checked = "";
									for($i=0; $i< count($religions); $i++){
										$i_value = $religions[$i];
										$i_value == $i_cmp ? $checked = "selected": $checked = "";
										echo '<option value="'.$i_value.'" '.$checked.'>'.ucfirst($i_value).'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							Blood Group
						</div>
						<div class="defin">
							<?php 
							//1 =========== list
								$bloods = array("a+", "b+", "ab+", "o+", "a-", "b-", "ab-", "o-"); //suppose this is comming from an nationalities api
							?>
							<select name="blood" class="form-select">
								<?php
								//2 ============ list
									$i_cmp = $basic_info[$basic_info_count++];
									$checked = "";
									for($i=0; $i< count($bloods); $i++){
										$i_value = $bloods[$i];
										$i_value == $i_cmp ? $checked = "selected": $checked = "";
										echo '<option value="'.$i_value.'" '.$checked.'>'.ucfirst($i_value).'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<!-- Row 6 -->
				<div class="heading">
					<div>National Identification</div>
				</div>
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							CNIC #
						</div>
						<div class="defin">
							<input class="input-text form-control" type="number" name="cnic" min="1000000000000" max="9999999999999" value="<?php echo $basic_info[$basic_info_count++]; ?>" required >
						</div>
					</div>
					<div class="flex-item">
						<div class="headin required">
							ISSUE Date
						</div>
						<div class="defin">
							<input class="form-control" type="date" name="cnicissuedate" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required">
						</div>
					</div>
				</div>
				
				<!-- row 7 -->
			
				<div class="flex-container">
					<div class="flex-item">
						<div class="headin required">
							ISSUE Place
						</div>
						<div class="defin">
							<input class="form-control" type="text" name="cnicissueplace" value="<?php echo $basic_info[$basic_info_count++]; ?>" required="required">
						</div>
					</div>
					
					<div class="flex-item">
						<div class="defin">
							
						</div>
					</div>
				</div>
			<input class="btn btn-lg" id="saveSubmit" type="submit" name="saveNext" value="save next">
		</form>
