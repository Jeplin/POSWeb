<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="robots" content="noindex, nofollow">
   	<meta name="author" content="jeplin"/>
    <title>Employee</title>
    
    <link rel="stylesheet" href="../../assets/css/employee.css">
    <link rel="stylesheet" href="../../assets/css/attendance.css">
    <link rel="stylesheet" href="../../assets/css/addemployee.css">
    <link rel="stylesheet" href="../../assets/css/editattendance.css">
</head>
<body>
    <div class="mainOuterDiv">

        <div class="headerEmployee">
            <span>Edit Attendance</span>
            <!-- <a href="index.php?addemployee">Add</a> -->
        </div>
        
        <div id="employeeList" >
            <div class='attendanceListItem'>
                <div class="field">
					<span>Employee Name</span>
					<span>Jeplin Devbarma</span>						
                </div>
                <div class="field">
					<span>Date</span>
					<span>Today's Date</span>						
                </div>
                <div class="field">
					<span>In Time</span>
					<input type="text" name="intime" placeholder="In Time">						
                </div>
                <div class="field">
					<span>Out Time</span>
					<input type="text" name="outtime" placeholder="Out Time">						
                </div>
                
                <div class="field">
                    <input type="submit" name="update" value="Update">
                    <input type="submit" name="cancel" value="Cancel">
                </div>

            </div>
        </div>
        

    </div>
</body>
</html>