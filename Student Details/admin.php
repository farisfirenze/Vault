<html>
<head>
 <title>ADMIN</title>
 <style>
 body
	{
		background-image : url('http://www.gotechnologix.com/wp-content/uploads/2016/05/dark-background-wallpaper.jpg');
		font-family: Verdana, Geneva, sans-serif;
		color: #b3bab2;
	}
	.box
	{
		border-style: solid;
		border-color: white;
		position: absolute;
		top: 300px;
		left: 480px;
		height: 200px;
		width: 400px;
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
		top: 50px;
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
<h2 class="titl" style="top: 150px;left: 530px;">Welcome ADMIN</h2>
<button class="update" style = "position: relative; top: 240px; left: 620px; height: 30px;" onclick="home()">LOG OUT</button>
<div class="box">

 <button class="update" style="left: 150px;"onclick="gotoDisplay()">Generate Report</button>
 </div>
 <script>
 function home()
 {
	 location.href = 'login.php';
 }
 function gotoDisplay()
 {
	 location.href = 'displayAdmin.php';
 }
 </script>
</body>
</html>

