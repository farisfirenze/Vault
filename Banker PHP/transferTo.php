<?php session_start(); ?>
<html>
    <head>
        <title>Transfer To</title>
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
                height: 400px;
                position: relative;
                top: 100px;
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
        </style>
    </head>
    <body>
        <div class="loginDiv">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php echo "Ready to transfer " . $_SESSION['name'] . "?"; ?><br/><br/>
            Recipient Acc No: <input class="textBox" type="text" name="recAccno"><br/><br/>
            Enter amount to transfer : <input class="textBox" type="text" name="transferAmount"><br/><br/>
            Password : <input class="textBox" type="password" name="trPassword"><br/><br/>
            <input class="buttons" type="submit" value="TRANSFER">
            <?php include 'connection.php' ?>
            <?php
            $accno = isset($_POST['recAccno']) ? $_POST['recAccno'] : null;
            $trAmount = isset($_POST['transferAmount']) ? $_POST['transferAmount'] : null;
            $trPassword = isset($_POST['trPassword']) ? $_POST['trPassword'] : null;
            $pass = $_SESSION['pass'];

            if (isset($_POST['trPassword']) && isset($_POST['recAccno']) && isset($_POST['transferAmount'])) {
                if ($pass == $trPassword) {
                    //echo $tempPass."  ".$password;
                    $query1 = "update customer set balance = (balance + " . $_POST['transferAmount'] . ") where accno = " . $accno . ";";
                    $query2 = "update customer set balance = (balance - " . $_POST['transferAmount'] . ") where accno = " . $_SESSION['user'] . ";";
                    $query3 = "update customer set LWAMOUNT = " . $_POST['transferAmount'] . " where accno = " . $_SESSION['user'];
                    $query4 = "update customer set LWTYPE = 'TRANSFER' where accno = " . $_SESSION['user'];
                    $query5 = "update customer set LWDATE = '" . date("d/m/Y") . "' where accno = " . $_SESSION['user'];
                    $query6 = "update customer set LWTIME = '" . date("h:i:sa") . "' where accno = " . $_SESSION['user'];
                    mysqli_query($conn, $query4);
                    mysqli_query($conn, $query5);
                    mysqli_query($conn, $query6);
                    mysqli_query($conn, $query3);
                    if (mysqli_query($conn, $query1))
                        echo "success: -$" . $trAmount;
                    if (mysqli_query($conn, $query2))
                        echo "<br/> Recipient : +$" . $trAmount;
                } else {
                    echo "Invalid Password : -$0";
                }
            }
            ?>

        </form>
        </div>
        <?php 
        if($_SESSION['type'] == 'customer')
            echo "<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"customerHome.php\">HOME</a>";
        else if($_SESSION['type'] == 'admin')
            echo "<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"managerHome.php\">HOME</a>";     
    ?>
    </body>
</html>