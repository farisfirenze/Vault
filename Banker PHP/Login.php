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
                width: 400px;
                height: 250px;
                position: relative;
                top: 300px;
                text-align: center;
                padding-top: 30px;
                left: 530px;
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
                height: 30px;
                width: 80px;
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
                left: 980px;
                opacity: 0.7;
            }
        </style>
        <script>
            function showPass()
            {
                var x = document.getElementById("password");

                if (x.type == 'password')
                    x.type = 'text';
                else
                    x.type = 'password';
            }
        </script>
    </head>
    <body>
    <center>
        <div>
            <h2 class="header">NATIONAL BANK OF INDIA</h2>
        </div>
    </center>
        <div class='loginDiv'>
            <div style="position: relative;left: 50px;">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table>
                        <tr>
                            <td>Account No : </td><td><input class="textBox" style="position: relative;top: 10px;" type="text" name="accno"><br/><br/></td>
                        </tr><tr><td> Password : </td><td><input class="textBox" type="password" name="password" id="password"><br/></td></tr>
                        <tr><td></td><td><input type="checkbox" onclick="showPass()">Show Password<br/><br/></td>
                    </table></div>
            <div style="position: relative; left: -10px; top: -20px;">
                    Account Type : <select class="textBox" name="accType">
                        <option value="admin">ADMIN</option>
                        <option value="customer">CUSTOMER</option>
                    </select><br/><br/>
                    <input class="buttons" type="submit" value="LOGIN">

                </form> 
                <form method = "post" action="createAccount.php">
                    <input class="buttons" style="width: 200px;position: relative;top: 10px;" type="submit" value="CREATE ACCOUNT">
                </form>
            </div>
        </div>
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
                <?php include 'connection.php' ?>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    /* if (isset($_POST['accno']))
                      {
                      $accno = $_POST['accno'];
                      }
                      if (isset($_POST['password']))
                      $password = $_POST['password'];
                      if (isset($_POST['accType']))
                      $type = $_POST['accType']; */
                    $accno = isset($_POST['accno']) ? $_POST['accno'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    $type = isset($_POST['accType']) ? $_POST['accType'] : null;


                    $query = "select * from login;";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['accno'] == $accno && $row['password'] == $password && $row['type'] == 'customer') {
                                $_SESSION['user'] = $row['accno'];
                                $_SESSION['pass'] = $row['password'];
                                $_SESSION['type'] = $row['type'];
                                echo "<script>location.href = \"customerHome.php\";</script>";
                            } else if ($row['accno'] == $accno && $row['password'] == $password && $row['type'] == 'admin') {
                                $_SESSION['user'] = $row['accno'];
                                $_SESSION['pass'] = $row['password'];
                                $_SESSION['type'] = $row['type'];
                                echo "<script>location.href = \"managerHome.php\";</script>";
                            } else {
                                $flag = true;
                            }
                        }
                        if ($flag)
                        {
                            echo "<h4 style=\"position: relative;left: 650px;top: -220px;color: black;\">No such account exists.</h4>";
                            echo "<script>document.getElementById(\"passDiv\").style.display = 'block';</script>";
                            
                        }
                            $flag = false;
                    }
                    $query1 = "select * from customer;";
                    $result1 = mysqli_query($conn, $query1);

                    if (mysqli_num_rows($result1) > 0) {
                        while ($row = mysqli_fetch_assoc($result1)) {
                            if ($row['ACCNO'] == $accno)
                                $_SESSION['name'] = $row['NAME'];
                        }
                    }
                }
                ?>
                
</body>                  
</html>