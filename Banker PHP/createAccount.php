<?php session_start(); ?>
<html>
    <head>
        <title>Login</title>

        <style >
            body
            {
                background-image : url('Images/background2.jpg');
                background-size: 1520px 730px;
                color: #cccccc;
                font-family: "Arial Black", Gadget, sans-serif;	
                font-weight: bold;

            }
            .loginDiv
            {
                border-style: solid;
                border-color: black;
                width: 600px;
                height: 550px;
                position: relative;
                top: 50px;
                padding-top: 30px;
                left: 400px;
                border-width: 20px;
                background-color: #333333;
                opacity: 0.8;
                padding-left: 60px;

            }
            .textBox
            {
                background-color: #9999ff;
                border-style: none;
                height: 25px;
                position: relative;
                left: 30px;

            }
            .buttons
            {
                position: relative;
                left: 80px;
                top: 20px;
                color: grey;
                background-color: black;
                border-style: none;
                height: 30px;
                width: 140px;
                font-weight: bold;
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
                left: 580px;
                top: -400px;
            }
        </style>
        <script>
        </script>
    </head>

    <body>
        <?php include 'connection.php' ?>
        <div class="loginDiv">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table style="position: relative; top: -20px;">
                    <tbody><tr><td>Account No : <input class ="textBox" type="text" name="accno" value="<?php
                                $query01 = "use bank;";
                                mysqli_query($conn, $query01);
                                $query00 = "create table maxacc as select max(ACCNO) + 1 as ACCNO from customer;";
                                mysqli_query($conn, $query00);
                                $query02 = "select * from maxacc;";
                                $result01 = mysqli_query($conn, $query02);

                                if (mysqli_num_rows($result01) >= 1) {
                                    if ($row = mysqli_fetch_assoc($result01)) {
                                        echo $row['ACCNO'];
                                    }
                                } else
                                    echo "error";
                                $query03 = "drop table maxacc;";
                                mysqli_query($conn, $query03);
                                ?>" readonly></td></tr><br/><br/><tr><td><br>
                            Password : <input class ="textBox" type="password" name="password" id="pass"><br/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="checkbox" onclick="change()">Show Password<br/></td></tr><tr><td>
                            Confirm Password : <input class ="textBox" type="password" name="cpassword" id="cpass"><br/><br/></td></tr><tr><td>
                            Account Type : <select class ="textBox" name="accType">
                                <option value="admin">ADMIN</option>
                                <option value="customer">CUSTOMER</option>
                            </select><br/><br/></td></tr><tr><td>
                            Full Name (in CAPS): <input class ="textBox" type="text" name="fullname"><br/><br/></td></tr><tr><td>
                            Address (IN CAPS): <input class ="textBox" type="text" name ="address"><br/><br/></td></tr><tr><td>
                            Phone No: <input class ="textBox" type="text" name="phoneno"><br/><br/></td></tr><tr><td>
                            Value of properties combined (in $) : <input class ="textBox" type="text" name="properties"><br/><br/></td></tr><tr><td>
                            Deposit (in $) : <input class ="textBox" type="text" name="balance"><br/></td></tr><tr><td>
                            <p id="warn"></p>
                            <input type="submit" class="buttons" style="left: 170px;height: 50px;" value="CREATE ACCOUNT">
                            <a href="Login.php" class="buttons" style="left: 340px;top: 40px;text-decoration: none;padding: 10px;">LOGIN</a>
                </table>
            </form> 
            <div class="passid" id="passDiv">
                <div style="position: relative; left: 5px;">
                    <ul style="font-size: 15px;font-family: Comic Sans MS, cursive, sans-serif;color: black;opacity: 1;">
                        <li>Passwords must be 8 - 16 characters long.</li>
                        <li>Passwords must have at least one uppercase character.</li>
                        <li>Passwords must consists of numbers.</li>
                        <li>Passwords must have at least one special character.</li>
                    </ul>
                </div>

            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {



                /* $accno = $_POST['accno'];
                  $pass = $_POST['password'];
                  $cpass = $_POST['cpassword'];
                  $type = $_POST['accType']; */

                $accno = isset($_POST['accno']) ? $_POST['accno'] : null;
                $pass = isset($_POST['password']) ? $_POST['password'] : null;
                $cpass = isset($_POST['cpassword']) ? $_POST['cpassword'] : null;
                $type = isset($_POST['accType']) ? $_POST['accType'] : null;
                $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : null;
                $address = isset($_POST['address']) ? $_POST['address'] : null;
                $phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : null;
                $properties = isset($_POST['properties']) ? $_POST['properties'] : null;
                $balance = isset($_POST['balance']) ? $_POST['balance'] : null;
               
                echo "<script>document.getElementById(\"passDiv\").style.display = 'block';</script>";


                $flag0 = 0;
                $flag1 = 0;
                $flag2 = 0;
                $flag = false;

                if (strlen($pass) >= 8 && strlen($pass) <= 16) {
                    for ($j = 'A'; $j < 'Z'; $j++) {
                        if (strpos($pass, $j) > -1) {
                            $flag0 = 1;
                        }
                    }
                    if (strpos($pass, $j++) > -1) {
                        $flag0 = 1;
                        echo "f0 set";
                    }
                    for ($i = 0; $i < strlen($pass); $i++) {
                        $char = $pass[$i];
                        if (is_numeric($char)) {
                            $flag1 = 1;
                        }
                    }
                    if (preg_match('/[\'^£$%&*()}{@!#~?><>,|=_+¬-]/', $pass)) {
                        $flag2 = 1;
                    }
                } else {
                    $flag0 = 0;
                    $flag1 = 0;
                    $flag2 = 0;
                }

                if ($flag0 == 1 && $flag1 == 1 && $flag2 == 1) {
                    $flag3 = 1;
                    $_SESSION['flag'] = $flag3;
                } else
                    $flag3 = 0;

                if ($flag3 == 1 && $pass != null && $cpass != null && $fullname != null && $address != null && $phoneno != null && $properties != null && $balance != null) {
                    if ($pass == $cpass) {
                        $query0 = "use bank;";
                        mysqli_query($conn, $query0);
                        $query = "insert into login(accno,password,type) values('" . $accno . "','" . $pass . "','" . $type . "');";
                        mysqli_query($conn, $query);
                        $query1 = "insert into customer(ACCNO,NAME,ADDRESS,PHONENO,PROPERTIES,LWDATE,LWTIME,LWTYPE,LWAMOUNT,BALANCE) values(" . $accno . ",'" . $fullname . "','" . $address . "'," . $phoneno . "," . $properties . ",'NULL','NULL','NULL',0," . $balance . ");";
                        mysqli_query($conn, $query1);
                        //echo mysqli_error($conn);
                        echo "Account Created!!Please Login.";
                    } else {

                        echo "Passwords do not Match !";
                    }
                } else if ($flag3 == 0 && $balance != null)
                    echo "Enter a Valid Password";
                else
                    echo "Fill All the fields !";
            }
            $flag0 = 0;
            $flag1 = 0;
            $flag2 = 0;
            $flag3 = 0;
            ?> 

        </div>
        <script>

            function change()
            {
                var x = document.getElementById("pass");
                var y = document.getElementById("cpass");
                if (x.type == 'password' && y.type == 'password')
                {
                    x.type = 'text';
                    y.type = 'text';
                }
                else
                {
                    x.type = 'password';
                    y.type = 'password';
                }
            }

        </script>
    </body>
</html>