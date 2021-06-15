<!DOCTYPE html>
<html>
	
	<body>
	
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
						<input class="form-control" type="text" name="street" value="<?php echo $contact_info[$contact_info_count++]; ?>" required >					
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						City/Province
					</div>			
					<div class="defin">	
						<input class="form-control" type="text" name="city_province" value="<?php echo $contact_info[$contact_info_count++]; ?>" required >
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
						<input class="form-control" type="text" name="country" value="<?php echo $contact_info[$contact_info_count++]; ?>" required >				
					</div>
				</div>
				<div class="flex-item">
					<div class="headin required">
						Zip code
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="zipCode" value="<?php echo $contact_info[$contact_info_count++]; ?>" required >
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
						<input class="form-control" type="number" name="phone" value="<?php echo $contact_info[$contact_info_count++]; ?>" required >			
					</div>
				</div>
				<div class="flex-item">
					<div class="headin">
						Email
					</div>			
					<div class="defin">	
						<input class="form-control" type="email" class="input-text" name="cEmail" value="<?php echo $contact_info[$contact_info_count++]; ?>" >
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
						<input class="form-control" type="text" name="facebook" value="<?php echo $contact_info[$contact_info_count++]; ?>">
					</div>
				</div>
				<div class="flex-item">
					<div class="headin">
						Whatsapp #
					</div>			
					<div class="defin">	
						<input class="form-control" type="number" name="whatsapp" value="<?php echo $contact_info[$contact_info_count++]; ?>">
					</div>
				</div>
			</div>
			<!-- Row 4  end ------------------------------------->
			
			<input id="saveSubmit" class="btn-lg btn-primary" type="submit" name="submit" value="Update">
		</form>
	</body>
</html>
