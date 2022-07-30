<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multistep Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'php/logic.php' ?> 
<div class="main_wraper">
	<div class="heaingwpr">
		<h1>Multistep Form </h1>
	</div>
	<div class="multistep_wraper">

		<form class="form" method="post" enctype="mulipart-formdata">
			<div class="step_wrapper">

				<?php // Step 1

				if($_SESSION['otherstep'] == 'notset'){
				?> 
				<div class="field_wpr">
				<div class="filed_head">Step 1</div>
					<div class="field_inner_wpr">
						<div class="field">
							<label for="firstname">Firstname</label>
							<input type="text" name="firstname" id="firstname" value="<?php 
							if(isset($_SESSION['firstname'])){
								echo $_SESSION['firstname'] ;
							}
							?>" >
							<span class="error">
							<?php
							if(isset($firstnameErr)){
								echo $firstnameErr ;
							}
							?>
							</span>
						</div>
						<div class="field">
							<label for="lastname">Lastname</label>
							<input type="text" name="lastname" id="lastname" value="<?php 
							if(isset($_SESSION['lastname'])){
								echo $_SESSION['lastname'] ;
							}
							?>" >
							<span class="error">
							<?php
							if(isset($lastnameErr)){
								echo $lastnameErr ;
							}
							?>
							</span>
						</div>
					</div>
					<div style="justify-content: end;" class="btn_bar">
						<button type="submit" class="next" name="next1">Next</button>
					</div>
				</div>
				<?php 
				}
				?>



				
				<?php   // Step 2
				
				if(isset($_POST['next1']) && $step1_flag || $step2_flag == false || isset($_POST['prev3'])){
				?>
				<div class="field_wpr">
					<div class="filed_head">Step 2</div>
					<div class="field_inner_wpr">
						<div class="field">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" value="<?php 
							if(isset($_SESSION['username'])){
								echo $_SESSION['username'] ;
							}
							?>">
							<span class="error">
							<?php
							if(isset($usernameErr)){
								echo $usernameErr ;
							}
							?>
							</span>
						</div>
						<div class="field">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" value="<?php 
							if(isset($_SESSION['email'])){
								echo $_SESSION['email'] ;
							}
							?>">
							<span class="error">
							<?php
							if(isset($emailErr)){
								echo $emailErr ;
							}
							?>
							</span>
						</div>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="prev2">Previous</button>
						<button type="submit" class="next" name="next2">Next</button>
					</div>
				</div>
				<?php 
				}
				?>



				<?php // Step 3
				if(isset($_POST['next2']) && $step2_flag || $step3_flag == false || isset($_POST['prev4'])){
				?>	
				<div class="field_wpr">
					<div class="filed_head">Step 3</div>
					<div class="field_inner_wpr" style="padding-right : 36%" >
						<div class="field">
							<label for="gender">Gender</label>
							<div id="gender">
								<div class="gender_field">
									<label for="male">Male</label>
									<input 
							<?php 
							if(isset($_SESSION['gender'])){
								if($_SESSION['gender'] == 1){
									echo "checked" ;
								}
							}
							?> 
							id="male" value="1" type="radio" name="gender">
								</div>
								<div class="gender_field">
									<label for="female">Female</label>
									<input 
							<?php 
							if(isset($_SESSION['gender'])){
								if($_SESSION['gender'] == 0){
									echo "checked" ;
								}
							}
							?> 
									 id="female" value="0" type="radio" name="gender">
								</div>
							</div>
							<span class="error">
							<?php
							if(isset($genderErr)){
								echo $genderErr ;
							}
							?>
							</span>
						</div>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="prev3">Previous</button>
						<button type="submit" class="next" name="next3">Next</button>
					</div>
				</div>

				<?php 
				}
				?>



				<?php // Step 4
				if(isset($_POST['next3']) && $step3_flag || $step4_flag == false || isset($_POST['prev5'])){
				?>	
				<div class="field_wpr">
					<div class="filed_head">Step 4</div>
					<div class="field_inner_wpr" style="padding-right: 45%;">
						<div class="field">
							<label for="state">State</label>
							<div id="state">
								<select name="state" class="selectbox">
									<option value="">Select Your State</option>
									<option
								<?php 
								if(isset($_SESSION['state'])){
									if($_SESSION['state'] == 1){
										echo "selected" ;
									}
								}
								?> 
									 value="1">Punjab</option>
									<option 
								<?php 
								if(isset($_SESSION['state'])){
									if($_SESSION['state'] == 2){
										echo "selected" ;
									}
								}
								?> 
									 value="2">Haryana</option>
									<option 
								<?php 
								if(isset($_SESSION['state'])){
									if($_SESSION['state'] == 3){
										echo "selected" ;
									}
								}
								?> 
									 value="3">Himachal</option>
									<option 
								<?php 
								if(isset($_SESSION['state'])){
									if($_SESSION['state'] == 4){
										echo "selected" ;
									}
								}
								?> 
									 value="4">Delhi</option>
								</select>
							</div>
						</div>
							<span class="error">
							<?php
							if(isset($stateErr)){
								echo $stateErr ;
							}
							?>
							</span>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="prev4">Previous</button>
						<button type="submit" class="next" name="next4">Next</button>
					</div>
				</div>

				<?php 
				}
				?>



				<?php // Step 5 

				if(isset($_POST['next4']) && $step4_flag || $step5_flag == false || isset($_POST['prev6'])){
				?>	
				<div class="field_wpr">
					<div class="filed_head">Step 5</div>
					<div class="field_inner_wpr" style="padding-right: 30%;">
						<div class="field">
							<label for="hobbies">Hobbies</label>
							<div id="hobbies">
								<div class="hobbies_row">
									<input
								<?php 
								if(isset($_SESSION['hobbies'])){
									if(in_array(1, $_SESSION['hobbies'])){
										echo "checked" ;
									}
								}
								?> 
									 type="checkbox" id="coding" value="1" name="hobbies[]">
									<label for="coding">Coding</label>
								</div>
								<div class="hobbies_row">
									<input 
								<?php 
								if(isset($_SESSION['hobbies'])){
									if(in_array(2, $_SESSION['hobbies'])){
										echo "checked" ;
									}
								}
								?> 
									 type="checkbox" id="Cooking" value="2" name="hobbies[]">
									<label for="Cooking">Cooking</label>
								</div>
								<div class="hobbies_row">
									<input 
								<?php 
								if(isset($_SESSION['hobbies'])){
									if(in_array(3, $_SESSION['hobbies'])){
										echo "checked" ;
									}
								}
								?> 
									 type="checkbox" id="Reading" value="3" name="hobbies[]">
									<label for="Reading">Reading</label>
								</div>
								<div class="hobbies_row">
									<input 
								<?php 
								if(isset($_SESSION['hobbies'])){
									if(in_array(4, $_SESSION['hobbies'])){
										echo "checked" ;
									}
								}
								?> 
									 type="checkbox" value="4" id="Writing" name="hobbies[]">
									<label for="Writing">Writing</label>
								</div>
							</div>
							<span class="error">
							<?php
							if(isset($hobbiesErr)){
								echo $hobbiesErr ;
							}
							?>
							</span>
						</div>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="prev5">Previous</button>
						<button type="submit" class="next" name="next5">Next</button>
					</div>
				</div>

				<?php 
				}
				?>



				<?php //Final Step

				if(isset($_POST['next5']) && $step5_flag){
				?>	
				<div class="field_wpr">
					<div class="filed_head">Step 6</div>
					<div class="field_inner_wpr" style="padding-right: 0; align-items: center;">
						<div class="field">
							<div class="test">Submit Your Information</div>
						</div>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="prev6">Previous</button>
						<button style="background: #cd5608;" type="text" class="next" name="submit">Submit</button>
					</div>
				</div>

				<?php 
				}
				?>


				<?php // Success Step

				if(isset($_POST['submit']) && $success){
				?>	
				<div class="field_wpr">
					<div class="field_inner_wpr" style="padding-right: 0; align-items: center;">
						<div class="field">
							<div class="test" style="font-size: 33px; margin-bottom: 20px;">Your Information Submitted Successfully</div>
						</div>
					</div>
					<div class="btn_bar">
						<button type="submit" class="prev" name="firststep">Back to First Step</button>
					</div>
				</div>

				<?php 
				}
				?>


			</div>
		</form>
	</div>
</div>
</body>
</html>