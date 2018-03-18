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
</head>
<body>
    <div class="mainOuterDiv">

        <div class="headerEmployee">
            <span>Attendance Records</span>
            <!-- <a href="index.php?addemployee">Add</a> -->
        </div>
        
        <div id="employeeList" >
            <div class='attendanceListItem'>
                <table class='tablecss'>
                    <tr>
                        <th>Date</th><th>Employee Name</th><th>In Time</th><th>Out Time</th><th></th>
                    </tr>
        <?php 
            include('../../connection.php');
            $connection = new createConnection(); 			//created a new object
            $connection_ref = $connection->connectToDatabase();

            $sql = "SELECT a.*,b.fname,b.lname,b.username FROM tbl_user_attendence as a LEFT JOIN tbl_users as b ON a.user_id=b.id ORDER BY a.id DESC"; 
			$rs_result = mysqli_query ($connection_ref, $sql); //run the query
            
            $mainData_arr=array();
            
            if($rs_result->num_rows > 0){
                $counter=0;
                while($row=$rs_result->fetch_assoc()){
                    $counter++;
                    //echo "<pre>";
                    //print_r($row);
                    //array_push($mainData_arr,$row);
                    //echo $row["fname"];
                    $dateStr=$row['in_time'];
                    $d = new DateTime($dateStr);
                   // $timestamp = $d->getTimestamp(); // Unix timestamp
                    $formatted_date = $d->format('Y-m-d'); // 2003-10-16

                    //echo $formatted_date;
                    
                    echo "
                            <tr>                              
                                <td>".$formatted_date."</td>
                                <td>".$row['fname']." ".$row['lname']."</td>
                                <td>".$row['in_time']."</td>
                                <td>".$row['out_time']."</td>
                                <td><a href='index.php?editattendance'>Edit</a></td>
                            </tr>
                        ";
                    
                }
                //echo "<pre>";
                // echo "Main Layout Data";
                //print_r($mainData_arr);         
    
            }
            else{
                echo "No Data Available";
            }

           // print_r($num_fields);

        ?>

            </table>
                    </a></div>
        </div>
        

    </div>
</body>
</html>