<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="robots" content="noindex, nofollow">
   	<meta name="author" content="jeplin"/>
    <title>Employee</title>
    
	<link rel="stylesheet" href="../../assets/css/addemployee.css">
	<link rel="stylesheet" href="../../assets/css/employee.css">
</head>
<body>
    <div class="mainOuterDiv">
        <div class="headerEmployee">
            <span>New Employee</span>
        </div>
        <form action="add.php" method="POST">
			<div class="formCss">
				<div class="formContainer">
					<div class="headerTop">
						<span>Employee Info (*)</span>
					</div>
					<div class="ContentTop">
						<div class="field">
							<span>Employee Type</span>
							<select>
								<option value="admin">Administrator</option>
								<option value="manager">Manager</option>
								<option value="waiter">Waiter</option>
							</select>
						</div>
						<div class="field">
							<span>First Name</span>
							<input type="text" name="firstName" placeholder="First Name">
							<span>Last Name</span>
							<input type="text" name="lastName" placeholder="Last Name">
						
						</div>
						<div class="field">
							<!-- <span>Last Name</span>
							<input type="text" name="lastName" placeholder="Last Name">
						</div> -->

						<div class="field">
							<span>Username</span>
							<input type="text" name="username" placeholder="Username">
						</div>

						<div class="field">
							<span>Email</span>
							<input type="text" name="email" placeholder="email">
						</div>

						<div class="field">
							<span>Phone Number</span>
							<input type="text" name="Phone" placeholder="Phone Number">
						</div>

						<div class="field">
							<span>Password</span>
							<input type="text" name="password" placeholder="Password">
						</div>

						<div class="field">
							<span>Confirm Password</span>
							<input type="text" name="confirmPass" placeholder="Confirm Password">
						</div>

						<div>
							<input type="submit" name="add" value="Create Account">
						</div>
					</div>
				</div>	
			</div>
		</form>
        
    </div>

</body>
</html>