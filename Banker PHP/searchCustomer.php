<?php session_start(); ?>
<html>
    <head>
        <title>Search Customer</title>
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
            <h3>Search customer by <?php echo $_SESSION['user']; ?> : (Admin Rights)</h3><br/><br/>
            Account No: <input class="textBox" type="text" name="accno"><br/><br/>
            <input class="buttons" type="submit" value="SEARCH">
            
            <?php include 'connection.php' ?>
            <?php
            $accno = isset($_POST['accno']) ? $_POST['accno'] : null;

            $query = "select * from customer where accno=" . $accno . ";";

            $result = mysqli_query($conn, $query);

            if (isset($_POST['accno'])) {
                if (mysqli_num_rows($result) == 1) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "<h4>Search results for accno : " . $accno;
                        echo "<br/><br/>";
                        echo "<table width=\"1200\" border=\"1\"><thead><th>ACCNO</th><th>NAME</th><th>ADDRESS</th><th>PHONENO</th><th>PROPERTIES</th><th>LWDATE</th><th>LWTIME</th><th>LWTYPE</th><th>LWAMOUNT</th><th>BALANCE</th></thead>";
                        echo "<tbody><tr><td>" . $row['ACCNO'];
                        echo "</td><td>" . $row['NAME'];
                        echo "</td><td>" . $row['ADDRESS'];
                        echo "</td><td>" . $row['PHONENO'];
                        echo "</td><td>" . $row['PROPERTIES'];
                        echo "</td><td>" . $row['LWDATE'];
                        echo "</td><td>" . $row['LWTIME'];
                        echo "</td><td>" . $row['LWTYPE'];
                        echo "</td><td>" . $row['LWAMOUNT'];
                        echo "</td><td>" . $row['BALANCE'];
                        echo "</td></tr></tbody></table>";
                        echo "<br/><br/>";
                        echo "<br/><br/>";
                    } else {
                        echo "No such account exists.";
                    }
                } else
                    echo "No such account exists. ";
            }
            ?>
            <a class="buttons" style="text-decoration: none;left: 100px;padding: 6px;top:20px;" href="managerHome.php">Home</a>
        </form>
        </div>
    </body>
</html>