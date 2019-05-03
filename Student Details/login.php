<html>
<head> 
	<title> Login </title>
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
		top: 100px;
		left: 200px;
		font-size: 30px;
	}
	.textField
	{
		position: relative;
		top: 10px;
		left: 40px;
		background-color: grey;
		border-style: none;
		width: 200px;
		height: 22px;
	}
	
	
	</style>
</head>
<body>
<div style="position:absolute;top:70px;left:40px;">
<img src="http://nitpy.ac.in/wp-content/uploads/2016/04/logomin.png" width="120">
</div>
<h3 class="titl">NATIONAL INSTITUTE OF TECHNOLOGY, PUDUCHERRY</h3>

<div class = "box">
<form id="login1" name="login1" method = "post" action = "loginverify.php">
<h3 class = "usernameStyle" >Username : </h3><input class = "textField" style="left: 170px;top: -30px;" type = "text" name = "username"><br/>
<h3 class = "usernameStyle" style="top:-30px">Password : </h3><input class = "textField" style="top: -70px; left: 170px;" type="password" name = "password"><br/>
<h3 class = "usernameStyle" style="top:-70px">Subject : </h3><input class = "textField" style="top: -110px;left: 170px;" type="text" name="subject"><br/>
<input class = "submitButton" type = "submit" value = "LOGIN">

</form>
</div>
<h5 style="position:absolute;top:540px;left: 470px;">A mini-Project by Faris, Dayeeta, Aravind, John, Adarsh</h5>
</body>
</html>