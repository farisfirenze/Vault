
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname = $_POST[""];
	$lname = $_REQUEST["lastname"];
	$rno = $_REQUEST["rno"];
	$age = $_REQUEST["age"];
	
	/*echo $fname."<br>";
	echo $lname."<br>";
	echo $rno."<br>";
	echo $age."<br>";*/
	
	$server_name = "localhost";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($server_name, $username, $password);
	if($conn)
	{
		echo "<br>connection success<br>";
	}
	else
	{
		echo "<br>conn failed";
		die();
	}
	
	$query = "use grade_stud;";
	/*if(*/mysqli_query($conn,$query)/*)
		echo "<br>success used";
	else
		echo "<br>failed";*/
	
	//$query = "insert into login () values("."'".$fname."','".$lname."','".$rno."',".$age.");";
	$query0 = "select * from CS302;";
	if(mysqli_query($conn,$query0))
	{
		if(mysql_num_rows($query0) > 0)
		{
			while($rows = mysqli_fetch_assoc($query0))
			{
				
				echo .$rows['ROLLNO'];
				echo .$rows['NAME'];
				echo .$rows['CT1_CT2'];
				echo .$rows['INTERNAL'];
				echo .$rows['TOTAL'];
				echo .$rows['GRADE'];
				/*echo "<tbody><tr><td>".$rows['ROLLNO'];
				echo "</td><td>".$rows['NAME'];
				echo "</td><td>".$rows['CT1_CT2'];
				echo "</td><td>".$rows['INTERNAL'];
				echo "</td><td>".$rows['SEMESTER'];
				echo "</td><td>".$rows['TOTAL'];
				echo "</td><td>".$rows['GRADE'];
				echo "</td></tr></tbody>";*/
			}
		}
	}
	//$query1 = "update cs302 set ";
	//echo $query;
	
	/*if(mysqli_query($conn,$query))
		echo "<br>success";	
	else
		echo "<br>failure";
	/*$query2 = "select * from login";
	$result = mysqli_query($conn,$query2);
	if(mysqli_num_rows($result) > 0)
	{
		while($rows = mysqli_fetch_assoc($result))
		{
			echo "First name :".$rows['firstname'];
			echo "last name :".$rows['lastname'];
			echo "roll no :".$rows['rno'];
			echo "age:".$rows['age'];
			echo "<br>";
		}
	}
	/*$query = "create table login(firstname varchar(10), lastname varchar(10), rno varchar(10), age int)";
	if(mysqli_query($conn,$query))
		echo "table created";
	else	
		echo "<br>table failure";
	/*$query = "create database db2";
	if(mysqli_query($conn,$query))
		echo "db created";
	else
		echo "failed";*/
}
?>