<?php session_start(); ?>
<html>
    <head>
        <title>Statement</title>
        <style >
            body
            {
                background-image : url('Images/background2.jpg');
                background-size: 1520px 730px;
                color: black;
                font-family: "Arial Black", Gadget, sans-serif;	
                font-weight: bold;

            }
            .loginDiv
            {
                border-style: solid;
                border-color: black;
                width: 600px;
                height: 300px;
                position: relative;
                top: 50px;
                text-align: center;
                padding-top: 30px;
                left: 430px;
                border-width: 20px;

            }
            .textBox
            {
                background-color: #9999ff;
                border-style: none;
                height: 25px;
                
            }
            .buttons
            {
                color: grey;
                background-color: black;
                border-style: none;
                height: 100px;
                width: 100px;
                font-weight: bold;
                position: relative;
            }
            .buttons:hover
            {
                background-color: 9999ff;
                border-style: solid;
                border-color: black;
                color: black;
                cursor: hand;
            }
            .header
            {
                position: absolute;
                top: 100px;
                left: 450px;
                font-size: 40px;
                color: black;
            }
            .passid
            {
                display: none;
                border-style: solid;
                border-color: #000000;
                background-color: #666666;
                width: 300px;
                height: 200px;
                position: relative;
                left: 980px;
                opacity: 0.7;
            }
            table
            {
                position: relative;
                left: 100px;
                top: 50px;
            }
            h4
            {
                 position: relative;
                top: 100px;
            }
        </style>
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php include 'connection.php' ?>
        <?php 
        
        $accno = $_SESSION['user'];
        $type = $_SESSION['type'];
        
        $query = "select * from customer where accno=".$accno.";";
        
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result) > 0)
        {
            if($row = mysqli_fetch_assoc($result))
            {
                echo "<center><h4>Statement for ".$accno." | Account Type :  ".$type;
                echo "</center><br/><br/>";
                echo "<table width=\"1200\" border=\"1\"><thead><th>ACCNO</th><th>NAME</th><th>ADDRESS</th><th>PHONENO</th><th>PROPERTIES</th><th>LWDATE</th><th>LWTIME</th><th>LWTYPE</th><th>LWAMOUNT</th><th>BALANCE</th></thead>";
                echo "<tbody><tr><td>".$row['ACCNO'];
                echo "</td><td>".$row['NAME'];
                echo "</td><td>".$row['ADDRESS'];
                echo "</td><td>".$row['PHONENO'];
                echo "</td><td>".$row['PROPERTIES'];
                echo "</td><td>".$row['LWDATE'];
                echo "</td><td>".$row['LWTIME'];
                echo "</td><td>".$row['LWTYPE'];
                echo "</td><td>".$row['LWAMOUNT'];
                echo "</td><td>".$row['BALANCE'];
                echo "</td></tr></tbody></table>";
                echo "<br/><br/>";
                echo "<br/><br/>";
            }
            else
            {
                echo "failure";
            }
        }
        else
            echo "failure ";
        
        ?>
             
        </form>
        <?php 
        if($_SESSION['type'] == 'customer')
            echo "<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"customerHome.php\">HOME</a>";
        else if($_SESSION['type'] == 'admin')
            echo "<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"managerHome.php\">HOME</a>";    
    ?>
                </body>
</html>