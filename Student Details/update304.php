<html>
<head>
<title>Update CS304</title>
 <style>
 body
	{
		background-image : url('http://www.gotechnologix.com/wp-content/uploads/2016/05/dark-background-wallpaper.jpg');
		font-family: Verdana, Geneva, sans-serif;
		color: #b3bab2;
		font-weight: bold;
	}
	.box
	{
		border-style: solid;
		border-color: white;
		position: absolute;
		top: 	250px;
		left: 	40px;
		height: 900px;
		width: 1260px;
	}
	.usernameStyle
	{
		position: relative;
		top: 10px;
		left: 40px;
		
	}
	.submitButton
	{
		position: relative;
		border-style: none;
		width: 70px;
		height: 30px;
		top: -90px;
		left: 250px;
		background-color: black;
		color: #b3bab2;
		font-family: Verdana, Geneva, sans-serif;
	}
	.submitButton:hover
	{
		border-style: solid;
		border-color: #b3bab2;
		cursor: hand;
	}
	.titl
	{
		position: absolute;
		top: 60px;
		left: 200px;
		font-size: 30px;
	}
	.update
	{
		border-style : none;
		width: 100px;
		height: 100px;
		position: relative;
		top: 50px
		;
		left: 70px;
		background-color: black;
		color: #b3bab2;	
			
	}
	.update:hover
	{
		border-style: solid;
		border-color: #b3bab2;
		cursor: hand;
	}
 </style>
	
</head>
<body>

<h3 class="titl">NATIONAL INSTITUTE OF TECHNOLOGY, PUDUCHERRY</h3>
<h2 class="titl" style="top: 150px;left: 500px;">UPDATE FOR CS304</h2>
<div class="box">
<form name = "form1" method ="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table width="1200" style="position: relative; left: 20px;top: 20px">
<thead>
  <th>ROLLNO</th><th>NAME</th><th>CT1 CT2</th><th>INTERNAL</th><th>SEMESTER</th><th>TOTAL</th><th>GRADE</th>
  </thead>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GRADE_STUD";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ROLLNO, NAME, CT1_CT2, INTERNAL, SEMESTER, TOTAL, GRADE FROM CS304";
$result = mysqli_query($conn, $sql);
$i=0;
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
	{
		
				echo "<tbody><tr><td>".$row['ROLLNO'];
				echo "</td><td>".$row['NAME'];
				echo "</td><td> <input type = \"text\" name = \"ct1_ct2[]\" value= ".$row['CT1_CT2'].">";	
				echo "</td><td> <input type = \"text\" name = \"internal[]\" value= ".$row['INTERNAL'].">";
				echo "</td><td> <input type = \"text\" name = \"semester[]\" value= ".$row['SEMESTER'].">";
				echo "</td><td> <input type = \"text\" name = \"total[]\" value= ".$row['TOTAL']." readonly >";
				echo "</td><td> <input type = \"text\" name = \"grade[]\" value= ".$row['GRADE']." readonly 	>";
				echo "</td></tr></tbody>";
				if(isset($_POST['ct1_ct2'][$i])){
					
					$ct1_ct2 = (int)$_POST['ct1_ct2'][$i];
					$internal = (int)$_POST['internal'][$i];
					$semester = (int)$_POST['semester'][$i];
					$total = $ct1_ct2 + $internal + $semester;
					if($total >= 90 && $total <= 100){
						$grade = 'A';
					}
					else if($total >= 80 && $total < 90){
					$grade = 'B';}
					else if($total >=70 && $total < 80){
					$grade = 'C';}
					else if($total >=60 && $total < 70){
					$grade = 'D';}
					else {
					$grade = 'F';}
					
					$query3 = "UPDATE CS304 SET CT1_CT2 = ".$_POST['ct1_ct2'][$i]." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query31 = "UPDATE CS304 SET TOTAL = ".$total." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query32 = "UPDATE CS304 SET GRADE = '".$grade."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					//$query00 = "UPDATE CGPA SET CGPA = '".."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					
					mysqli_query($conn,$query3) or die(mysqli_error($conn));
					mysqli_query($conn,$query31);
					mysqli_query($conn,$query32);
				}
				if(isset($_POST['internal'][$i])){
					$ct1_ct2 = (int)$_POST['ct1_ct2'][$i];
					$internal = (int)$_POST['internal'][$i];
					$semester = (int)$_POST['semester'][$i];
					$total = $ct1_ct2 + $internal + $semester;
					if($total >= 90 && $total <= 100)
						$grade = 'A';
					else if($total >= 80 && $total < 90)
						$grade = 'B';
					else if($total >=70 && $total < 80)
						$grade = 'C';
					else if($total >=60 && $total < 70)
						$grade = 'D';
					else 
						$grade = 'F';
					
					$query4 = "UPDATE CS304 SET INTERNAL = ".$_POST['internal'][$i]." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query31 = "UPDATE CS304 SET TOTAL = ".$total." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query32 = "UPDATE CS304 SET GRADE = '".$grade."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					
					mysqli_query($conn,$query4) or die(mysqli_error($conn));
					mysqli_query($conn,$query31);
					mysqli_query($conn,$query32);
				}
				if(isset($_POST['semester'][$i])){
					$ct1_ct2 = (int)$_POST['ct1_ct2'][$i];
					$internal = (int)$_POST['internal'][$i];
					$semester = (int)$_POST['semester'][$i];
					$total = $ct1_ct2 + $internal + $semester;
					if($total >= 90 && $total <= 100)
						$grade = 'A';
					else if($total >= 80 && $total < 90)
						$grade = 'B';
					else if($total >=70 && $total < 80)
						$grade = 'C';
					else if($total >=60 && $total < 70)
						$grade = 'D';
					else 
						$grade = 'F';
					
					$query5 = "UPDATE CS304 SET SEMESTER = ".$_POST['semester'][$i]." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query31 = "UPDATE CS304 SET TOTAL = ".$total." WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					$query32 = "UPDATE CS304 SET GRADE = '".$grade."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					
					mysqli_query($conn,$query5) or die(mysqli_error($conn));
					mysqli_query($conn,$query31);
					mysqli_query($conn,$query32);
				}
				/*sqli_query($conn,$query6) or die(mysqli_error($conn));
				}
				if(isset($_POST['grade'][$i])){
					$query7 = "UPDATE CS304 SET GRADE = '".$_POST['grade'][$i]."' WHERE ROLLNO = \"".$row['ROLLNO']."\";";
					mysqli_query($conn,$query7) or die(mysqli_error($conn));
				}*/
				
				//echo $query3;
				$i++;
    }
	
				
} else 
{
    echo "0 results";
}


mysqli_close($conn);
?>
</table>
  <input class = "submitButton" style="top:50px;left: 1000px;"type="submit" value="Submit">
</form> 
</div>
</body>
</html>
