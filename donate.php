<?php 
  //include header file
  include ('include/header.php');


  if(isset($_POST['submit'])){
// term input check
  	if(isset($_POST['term'])===true){
	// name input check
	  		if(isset($_POST['name']) && !empty($_POST['name'])){

	  				if(preg_match('/^[A-Za-z\s]+$/', $_POST['name'])){
	  						$name=$_POST['name'];
	  				}
		  			else{
					$nameerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Lower and Upper case are allow...</strong>
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
					</button>
					</div>';
	  				}

	  		}else{
			  		$nameerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Please fill the name field...</strong>
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 		</button>
					</div>';

	  		}
	  		// city input check
	  		if(isset($_POST['city']) && !empty($_POST['city'])){

	  				if(preg_match('/^[A-Za-z\s]+$/', $_POST['city'])){
	  						$city=$_POST['city'];
	  				}
		  			else{
					$cityerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Lower and Upper case are allow...</strong>
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
					</button>
					</div>';

	  				}

	  		}else{
			  		$cityerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Please fill the city field...</strong>
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 		</button>
					</div>';

		  		}
	  		// email input check
	  		if(isset($_POST['email']) && !empty($_POST['email'])){

	  				if(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $_POST['email'])){
	  						$check_email=$_POST['email'];
	  						$sql ="SELECT email FROM donor WHERE  email='$check_email'";
						
							$result= mysqli_query($connection,$sql);

							if(mysqli_num_rows($result)>0){
									$emailerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								 	<strong>Sorry Email is already exist...</strong>
								 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  	<span aria-hidden="true">&times;</span>
									</button>
									</div>';

							}
							else{
										$email=$_POST['email'];
							}
	  				}
		  			else{
					$emailerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Please enter valid Email address...</strong>
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
					</button>
					</div>';

	  				}

	  		}else{
			  		$emailerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Please fill the email address field...</strong>
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 		</button>
					</div>';

	  		}
  		// contact input check
	  		if(isset($_POST['contact_no']) && !empty($_POST['contact_no'])){

	  				if(preg_match('/\d{10}/', $_POST['contact_no'])){
	  						$contact_no=$_POST['contact_no'];
	  				}
		  			else{
					$contact_noerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				 	<strong>Contact should consist 10 character...</strong>
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
					</button>
					</div>';

	  				}

	  		}else{
			  		$contact_noerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Please fill the contact_no field...</strong>
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 		</button>
					</div>';

	  		}
	  		//blood group input check
	  		if(isset($_POST['blood_group']) && !empty($_POST['blood_group'])){
				$blood_group=$_POST['blood_group'];

	  		}else{
			  		$blood_grouperror= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  	<strong>Select your Bood Group...</strong>
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>';
		  		}
			// date input check
	  		if(isset($_POST['date']) && !empty($_POST['date'])){
				$date=$_POST['date'];

	  		}else{
			  		$dateerror= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
				  	<strong>Please select your Birth date...</strong>
				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				 	</button>
					</div>';

	  		}
	  		// month input check
	  		if(isset($_POST['month']) && !empty($_POST['month'])){
				$month=$_POST['month'];

	  		}else{
			  		$montherror= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
					 <strong>please select your Birth month...</strong>
				 	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				   	 <span aria-hidden="true">&times;</span>
				 	 </button>
					 </div>';
		  		}
	  		// yearinput check
	  		if(isset($_POST['year']) && !empty($_POST['year'])){
				$year=$_POST['year'];

	  		}else{
			  		$yearerror= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Please select your Birth year...</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 	<span aria-hidden="true">&times;</span>
				  	</button>
					</div>';

		  	}
	  	// gender input check
		  	if(isset($_POST['gender']) && !empty($_POST['gender'])){
				$gender=$_POST['gender'];

	  		}else{
			  		$gendererror= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Please select your gender...</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				 	<span aria-hidden="true">&times;</span>
				  	</button>
					</div>';

		  	}
	  	// Password input check
  			if(isset($_POST['password']) && !empty($_POST['password'])&&isset($_POST['c_password']) && !empty($_POST['c_password'])){

  				if(strlen($_POST['password'])>=6){
  					if( $_POST['password']==$_POST['c_password']){
  					    $password=$_POST['password'];
  					    $password=md5($password);
  					}
  					else{
		  				$passworderror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	<strong>Password  & confim password are not same...</strong>
					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
						</button>
						</div>';
		  				}
  				}
	  			else{
						$passworderror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 	<strong>Password should consist 6 character...</strong>
					 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
						</button>
						</div>';
  				}

	  			}
	  		else{
			  		$passworderror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  		<strong>Please fill the Password field...</strong>
			 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 		</button>
					</div>';
  				}
	
	// insert in to database
			if(isset($name)&&isset($password)&&isset($month)&&isset($date)&&isset($email)&&isset($year)&&isset($blood_group)&&isset($contact_no)&&isset($city)&&isset($gender)){
					$dob= $date."-".$month."-".$year;
					
					$sql = "INSERT INTO `donor`(`name`, `gender`, `email`, `city`, `dob`, `contact_no`, `save_life_date`, `password`, `blood_group`) VALUES ('$name','$gender','$email','$city','$dob','$contact_no','0','$password','$blood_group')";
					
					if(mysqli_query($connection,$sql)){
							header("Location: signin.php");
					}
					else{

						  		$submiterror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  		<strong>Data is not insert try again...</strong>
						 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    	<span aria-hidden="true">&times;</span>
						 		</button>
								</div>';
					}
				}

		}else{
			$termerror= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Please agree term & conditions...</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
}
?>
<style>
	.size{
		min-height: 0px;
		padding: 60px 0 40px 0;
		
	}
	.form-container{
		background-color: white;
		border: .5px solid #eee;
		border-radius: 5px;
		padding: 20px 10px 20px 30px;
		-webkit-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
   -moz-box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
    box-shadow: 0px 2px 5px -2px rgba(89,89,89,0.95);
	}
	.form-group{
		text-align: left;
	}
	h1{
		color: white;
	}
	h3{
		color: #e74c3c;
		text-align: center;
	}
	.red-bar{
		width: 25%;
	}
</style>
<div class="container-fluid red-background size">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Donate</h1>
			<hr class="white-bar">
		</div>
	</div>
</div>
<div class="container size">
	<div class="row">
		<div class="col-md-6 offset-md-3 form-container">
					<h3>SignUp</h3>
					<hr class="red-bar">
					<?php if(isset($termerror)) echo"$termerror";
							if(isset($submitsucess)) echo"$submitsucess";
							if(isset($submiterror)) echo"$submiterror";


					?>

          <!-- Error Messages -->

				<form class="form-group" action="" method="post"  novalidate="yes" >
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" name="name" id="fullname" placeholder="Full Name" required pattern="[A-Za-z\s]+" title="Only lower and upper case and space" class="form-control" value="<?php if(isset($name)) echo"$name";?>">
						<?php if(isset($nameerror)) echo"$nameerror";?>
					</div><!--full name-->
					
					<div class="form-group">
              <label for="name">Blood Group</label><br>
              <select class="form-control demo-default" id="blood_group" name="blood_group" required>
                <option value="">---Select Your Blood Group---</option>
                <?php if(isset($blood_group)) echo'<option selected="" value="'.$blood_group.'">'.$blood_group.'</option>'; ?>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
              </select>
              <?php if(isset($blood_grouperror)) echo"$blood_grouperror";?>
            </div><!--End form-group-->
            
					<div class="form-group">
				              <label for="gender">Gender</label><br>
				              		Male<input type="radio" name="gender" id="gender" value="Male" style="margin-left:10px; margin-right:10px;" checked>
				              		Female<input type="radio" name="gender" id="gender" value="Female" style="margin-left:10px;"
				              		<?php if(isset($gender)) echo"checked";?>>
				              		 <?php if(isset($gendererror)) echo"$gendererror";?>
				    </div><!--gender-->
				   
				    <div class="form-inline">
              <label for="name">Date of Birth</label><br>
              <select class="form-control demo-default" id="date" name="date" style="margin-bottom:10px;" required>
              	  <?php if(isset($date)) echo'<option selected="" value="'.$date.'">'.$date.'</option>'; ?>
                <option value="">--Date--</option>
                <option value="01" >01</option><option value="02" >02</option><option value="03" >03</option><option value="04" >04</option><option value="05" >05</option><option value="06" >06</option><option value="07" >07</option> <option value="08" >08</option><option value="09" >09</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" >30</option><option value="31" >31</option>
              </select>
              <select class="form-control demo-default" name="month" id="month" style="margin-bottom:10px;" required>
              	  <?php if(isset($month)) echo'<option selected="" value="'.$month.'">'.$month.'</option>'; ?>
                <option value="">--Month--</option>
                <option value="01" >January</option><option value="02" >February</option><option value="03" >March</option><option value="04" >April</option><option value="05" >May</option><option value="06" >June</option><option value="07" >July</option><option value="08" >August</option><option value="09" >September</option><option value="10" >October</option><option value="11" >November</option><option value="12" >December</option>
              </select>
              <select class="form-control demo-default" id="year" name="year" style="margin-bottom:10px;" required>
              	  <?php if(isset($year)) echo'<option selected="" value="'.$year.'">'.$year.'</option>'; ?>
                <option value="">--Year--</option>
                <option value="1957" >1957</option><option value="1958" >1958</option><option value="1959" >1959</option><option value="1960" >1960</option><option value="1961" >1961</option><option value="1962" >1962</option><option value="1963" >1963</option><option value="1964" >1964</option><option value="1965" >1965</option><option value="1966" >1966</option><option value="1967" >1967</option><option value="1968" >1968</option><option value="1969" >1969</option><option value="1970" >1970</option><option value="1971" >1971</option><option value="1972" >1972</option><option value="1973" >1973</option><option value="1974" >1974</option><option value="1975" >1975</option><option value="1976" >1976</option><option value="1977" >1977</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option><option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option><option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option><option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option><option value="2000" >2000</option><option value="2001" >2001</option><option value="2002" >2002</option><option value="2003" >2003</option>
              </select>
          
            </div>
            <table>
            	<tr>
            		<td><?php if(isset($dateerror)) echo"$dateerror";?></td>
            		<td><?php if(isset($montherror)) echo"$montherror";?></td>
            		<td><?php if(isset($yearerror)) echo"$yearerror";?></td>
            	</tr>
            </table>
            
				    <div class="form-group">
						<label for="fullname">Email</label>
						<input type="text" name="email" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please write correct email" class="form-control" value="<?php if(isset($email)) echo"$email";?>">
					</div>
					 <?php if(isset($emailerror)) echo"$emailerror";?>
					<div class="form-group">
              <label for="contact_no">Contact No</label>
              <input type="text" name="contact_no" placeholder="03********" class="form-control" required pattern="^\d{10}$" title="10 numeric characters only" maxlength="10" value="<?php if(isset($contact_no)) echo"$contact_no";?>">
              <?php if(isset($contacterror)) echo"$contacterror";?>
            </div><!--End form-group-->
             
					<div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control demo-default" required>
		<option value="">-- Select --</option>
	 <?php if(isset($city)) echo'<option selected="" value="'.$city.'">'.$city.'</option>'; ?><optgroup title="GUJARAT" label="&raquo; GUJARAT"></optgroup><option value="Ahmedabad" >Ahmedabad</option>
	 <option value="Amreli" >Amreli</option><option value="Anand" >Anand</option><option value="Banas Kantha" >Banas Kantha</option><option value="Bharuch" >Bharuch</option><option value="Bhavnagar" >Bhavnagar</option><option value="Dohad" >Dohad</option><option value="Gandhinagar" >Gandhinagar</option><option value="Jamnagar" >Jamnagar</option><option value="Junagadh" >Junagadh</option><option value="kachchh" >Kachchh</option><option value="Kedha" >Kedha</option><option value="Mahesana" >Mahesana</option><option value="Narmada" >Narmada</option><option value="Navsari" >Navsari</option><option value="Panchmahal" >Panchmahal</option><option value="Patan" >Patan</option><option value="Porbandar" >Porbandar</option><option value="Rajkot" >Rajkot</option><option value="Sabar Kantha" >Sabar Kantha</option><option value="Surat">Surat</option><option value="Surendranagar" >Surendranagar</option><option value="Tapi
	 " >Tapi</option><option value="The Dangs" >The Dangs</option><option value="vadodara" >Vadodra</option><option value="Valsad" >Valsad</option></select>
	 <?php if(isset($cityerror)) echo"$cityerror";?>
            </div><!--city end-->
            
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" value="" placeholder="Password" class="form-control" required pattern=".{6,}">
               <?php if(isset($passworderror)) echo"$passworderror";?>
            </div><!--End form-group-->
            
            <div class="form-group">
              <label for="password">Confirm Password</label>
              <input type="password" name="c_password" value="" placeholder="Confirm Password" class="form-control" required pattern=".{6,}">
            </div><!--End form-group-->
          
            <div class="form-inline">
              <input type="checkbox" checked="" name="term" value="true" required style="margin-left:10px;">
              <span style="margin-left:10px;"><b>I am agree to donate my blood and show my Name, Contact Nos. and E-Mail in Blood donors ...</b></span>
            </div><!--End form-group-->
			
					<div class="form-group">
						<button id="submit" name="submit" type="submit" class="btn btn-lg btn-danger center-aligned" style="margin-top: 20px;">SignUp</button>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
  //include footer file
  include ('include/footer.php');
?>