<?php session_start(); ?>
<html>
    <head>
        <title>Delete Customer</title>
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
                left: -300px;
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
        <div class="loginDiv">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <center>
                <h3>Delete customer by <?php echo $_SESSION['user']; ?> | Account Type : <?php echo $_SESSION['type']; ?></h3><br/><br/></center>
            *NOTE* Whatever operations you do, it gets affected in the DATABASE 'CUSTOMER'<br/><br/>
            Account No: <input class="textBox" type="text" name="accno"><br/><br/>
            <input class="buttons" type="submit" value="DELETE">

        </form>
        </div>
        <?php include 'connection.php' ?>
        <?php
        $accno = isset($_POST['accno']) ? $_POST['accno'] : null;

        $query = "delete from customer where accno = " . $accno . ";";

        if (isset($_POST['accno'])) {
            echo "<script type='text/javascript'> var answer = confirm('Do you want to delete " . $accno . " ?'); </script>";
            $answer = "<script type='text/javascript'> document.write(answer); </script>";
        } else
            $answer = false;

        if ($answer) {
            mysqli_query($conn, $query);
            echo "<br/><h5>Account Deleted</h4>";
        }
        ?>
        <a class="buttons" style="text-decoration: none;left: 500px;padding: 6px;top:0px;" href="managerHome.php">Home</a>
    </body>
</html>