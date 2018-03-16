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
</head>
<body>
    <div class="mainOuterDiv">

        <div class="headerEmployee">
            <span>Employee Records</span>
            <a href="index.php?addemployee">Add</a>
        </div>
        
        <div id="employeeList" >
        <?php 
            include('../../connection.php');
            $connection = new createConnection(); 			//created a new object
            $connection_ref = $connection->connectToDatabase();

            $sql = "SELECT * FROM tbl_users"; 
			$rs_result = mysqli_query ($connection_ref, $sql); //run the query
            
            $mainData_arr=array();
            
            if($rs_result->num_rows > 0){
                $counter=0;
                while($row=$rs_result->fetch_assoc()){
                    $counter++;
                    //print_r($row[]);
                    //array_push($mainData_arr,$row);
                    //echo $row["fname"];
                    
                    echo "<div class='employeeListItem'><a href='?employeedetails'>".$counter.". ".  $row["fname"]."</a></div>";
                    
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
        </div>
        

    </div>
</body>
</html>