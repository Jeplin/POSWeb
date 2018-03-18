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
<?php 
            include('../../connection.php');
            $connection = new createConnection(); 			//created a new object
            $connection_ref = $connection->connectToDatabase();

            // $USER_ID=$json_data['userId'];
            $USER_ID=1;
            
            $sqlUser="SELECT a.*,b.type FROM tbl_users as a LEFT JOIN tbl_usertype as b  ON a.user_type_id=b.id WHERE a.id='$USER_ID'";
            $userResult=$connection_ref->query($sqlUser);
        
            // echo "Data ";
            //echo "<pre>";
        
            $mainData_arr=array();
            $user_Arr=array();
            if($userResult->num_rows > 0){
                while($row=$userResult->fetch_assoc()){
                    array_push($user_Arr,$row);
                }
        
                $user_Data=$user_Arr[0];
                $user_id=$user_Data["id"];
                //Floor Data fetch 
                $sqlUserDetail="SELECT * FROM tbl_userdetail WHERE user_id='$user_id'";
                
                $detailResult = $connection_ref->query($sqlUserDetail);
                
                $Detail_Array=array();
                if ($detailResult->num_rows > 0) {
                    // output data of each row
                    while($row1 = $detailResult->fetch_assoc()) {
                        
                        array_push($Detail_Array,$row1);
                    }
                    //print_r($Detail_Array);
        
                    $sqlCurDetail="SELECT * FROM tbl_current_address WHERE user_id='$user_id'";
                    $curDetailResult=$connection_ref->query($sqlCurDetail);
                    $Current_Arr=array();
                    if($curDetailResult->num_rows>0){
                        while($row2=$curDetailResult->fetch_assoc()){
                            array_push($Current_Arr,$row2);
                        }
                        //print_r($Current_Arr);
                    }
        
                    $sqlPerDetail="SELECT * FROM tbl_permanent_address WHERE user_id='$user_id'";
                    $perDetailResult=$connection_ref->query($sqlPerDetail);
                    $Permanent_arr=array();
                    if($perDetailResult->num_rows>0){
                        while($row2=$perDetailResult->fetch_assoc()){
                            array_push($Permanent_arr,$row2);
                        }
                        //print_r($Permanent_arr);
                    }
        
                    $Full_detail=array(
                        'detail'=>$Detail_Array[0],
                        'currentAddress'=>$Current_Arr[0],
                        'permanentAddress'=>$Permanent_arr[0]
                    );
                }
        
                $allData=array(
                    'id'=>$user_Data['id'],
                    'userTypeId'=>$user_Data['user_type_id'],
                    'userType'=>$user_Data['type'],
                    'firstName'=>$user_Data['fname'],
                    'lastName'=>$user_Data['lname'],
                    'username'=>$user_Data['username'],
                    'password'=>$user_Data['password'],
                    'joiningDate'=>$user_Data['joining'],
                    'details'=>$Full_detail,
                    'modified_date'=>$user_Data['modified_date']
                );
                
                array_push($mainData_arr,$allData);
        
                // array_push($mainData_arr,$main_Layout_Data);
                //echo "<pre>";
                // echo "Main Layout Data";
                //print_r($mainData_arr);
                // echo "<br/>";
                
                
        
            }

        ?>

    <div class="mainOuterDiv">
        <div class="headerEmployee">
            <span>Employee</span>
        </div>
        <form action="../addemployee/add.php" method="POST">
			<div class="formCss">
				<div class="formContainer">
					<div class="headerTop">
						<span>Employee Info</span>
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
							<span>Password</span>
							<input type="text" name="password" placeholder="Password">
						</div>

						<div class="field">
							<span>Email</span>
							<input type="text" name="email" placeholder="email">
						</div>

						<div class="field">
							<span>Phone Number</span>
							<input type="text" name="phone" placeholder="Phone Number">
						</div>

                        <div class="field">
							<span>DOB</span>
							<input type="text" name="dob" placeholder="DOB">
						</div>

                        <div class="field">
							<span>Date of Joining</span>
							<input type="text" name="doj" placeholder="Date of Joining">
						</div>


						
					</div>
				</div>
                
                <!-- Family Detail -->
            </div>
            <!-- Family info -->
            <div class="formContainer">
					<div class="headerTop">
						<span>Family Info</span>
					</div>
                    
					<div class="ContentTop">
						<div class="field">
							<span>Father's Name</span>
							<input type="text" name="fatherName" placeholder="Father's Name">
						
                        </div>
                        
                        <div class="field">
							<span>Mother's Name</span>
							<input type="text" name="motherName" placeholder="Mother's Name">
						
                        </div>
                        
                        <div class="field">
							<span>Contact Number</span>
							<input type="text" name="familyContact" placeholder="Contact Number">
						
						</div>


					</div>
                </div>
                
                <!-- Current Address Info -->
                <div class="formContainer">
					<div class="headerTop">
						<span>Current address</span>
					</div>
                    
					<div class="ContentTop">
						<div class="field">
							<span>Address 1</span>
                            <textarea name="curAddrOne" placeholder="Address"></textarea>
                        </div>
                        
                        <div class="field">
							<span>Address 2</span>
                            <textarea name="curAddrTwo" placeholder="Address"></textarea>                            
                        </div>
                        
                        <div class="field">
							<span>City</span>
							<input type="text" name="curCity" placeholder="City">
						
                        </div>
                        
                        <div class="field">
							<span>State</span>
							<input type="text" name="curState" placeholder="State">
						
                        </div>
                        
                        <div class="field">
							<span>Country</span>
							<input type="text" name="curCountry" placeholder="Country">
						
                        </div>
                        
                        <div class="field">
							<span>Pincode</span>
							<input type="text" name="curPinCode" placeholder="Pincode">
						
						</div>


					</div>
                </div>
                
                <!-- Current Address Info -->
                <div class="formContainer">
					<div class="headerTop">
						<span>Permanent address</span>
					</div>
                    
					<div class="ContentTop">
						<div class="field">
							<span>Address 1</span>
                            <textarea name="perAddrOne" placeholder="Address"></textarea>
                        </div>
                        
                        <div class="field">
							<span>Address 2</span>
                            <textarea name="perAddrTwo" placeholder="Address"></textarea>                            
                        </div>
                        
                        <div class="field">
							<span>City</span>
							<input type="text" name="perCity" placeholder="City">
						
                        </div>
                        
                        <div class="field">
							<span>State</span>
							<input type="text" name="perState" placeholder="State">
						
                        </div>
                        
                        <div class="field">
							<span>Country</span>
							<input type="text" name="perCountry" placeholder="Country">
						
                        </div>
                        
                        <div class="field">
							<span>Pincode</span>
							<input type="text" name="perPinCode" placeholder="Pincode">
						
						</div>


					</div>
                </div>
                
                <!-- Submit -->

                <!-- Current Address Info -->
                <div>
					<input type="submit" name="submitted" value="Update">
					<input type="submit" name="submitted" value="Cancel">
				</div>
		</form>
        
    </div>

</body>
</html>