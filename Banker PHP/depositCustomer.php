<?php session_start(); ?>
<html>
    <head>
        <title>Customer Deposit</title>
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
            <?php echo "Welcome " . $_SESSION['name']; ?><br/><br/>
            Enter amount to deposit : <input class="textBox" type="text" name="depositAmount"><br/><br/>
            Password : <input class="textBox" type="password" name="depositPassword">
            <br/><br/><br/><input class="buttons" type="submit" name="depositSubmit">
            <?php include 'connection.php' ?>
            <?php
            /* if (isset($_POST['depositAmount']))
              $depositAmount = $_POST['depositAmount'];
              if (isset($_POST['depositPassword']))
              $password = $_POST['depositPassword']; */

            $depositAmount = isset($_POST['depositAmount']) ? $_POST['depositAmount'] : null;
            $password = isset($_POST['depositPassword']) ? $_POST['depositPassword'] : null;
            $tempPass = $_SESSION['pass'];

            if (isset($_POST['depositAmount']) && isset($_POST['depositPassword'])) {
                if ($tempPass == $password) {
                    //echo $tempPass."  ".$password;
                    $query1 = "update customer set balance = (balance + " . $_POST['depositAmount'] . ") where accno = " . $_SESSION['user'] . ";";
                    if (mysqli_query($conn, $query1))
                        echo "success : +$" . $depositAmount;
                } else {
                    echo "Invalid Password : +$0";
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