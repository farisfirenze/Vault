
<html>
    <head>
        <title>Login</title>
        <style>
            body
            {
                background-image : url('Images/background2.jpg');
                background-size: 1520px 730px;
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
                border-style: solid;
                width: 300px;
                height: 200px;
                position: relative;
                left: 980px;
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
                    <tr><td> Password : </td><td><input type="text" name="password" id="password"><br/></td></tr>

                </table></div>
        <div style="position: relative; left: -10px; top: -20px;">
            Account Type : <select class="textBox" name="accType">
                <option value="admin">ADMIN</option>
                <option value="customer">CUSTOMER</option>
            </select><br/><br/>
            <input class="buttons" type="submit" value="LOGIN">

            </form> 
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
                $pass = isset($_POST['password']) ? $_POST['password'] : null;
                    
                $flag0 = 0;
                $flag1 = 0;    
                $flag2 = 0;
                
                if (strlen($pass) >= 8 && strlen($pass) <= 16) 
                {
                    for ($j = 'A'; $j < 'Z'; $j++) 
                    {
                        if (strpos($pass, $j) > -1) 
                        {
                            $flag0 = 1;
                        } 
                    }
                    if (strpos($pass, $j++) > -1) 
                    {
                        $flag0 = 1;
                        echo "f0 set";
                    }
                    for ($i = 0; $i < strlen($pass); $i++) 
                    {
                        $char = $pass[$i];
                        if (is_numeric($char)) 
                            {
                                $flag1 = 1;
                            }
                    }
                    if(preg_match('/[\'^£$%&*()}{@!#~?><>,|=_+¬-]/', $pass))
                    {
                        $flag2 = 1;
                    }
                }
                else
                {
                    $flag0 = 0;
                    $flag1 = 0;
                    $flag2 = 0;
                }
                if($flag0 == 1 && $flag1 == 1 && $flag2 == 1)
                    echo "1";
                else
                    echo "0";
                
                /*$arrPass = str_split($pass);
                for ($i = 0; $i < strlen($pass); $i++) {
                    for ($k = 0; $k <= 9; $k++) {
                        if ($arrPass[$i] == $k && ) {
                            echo "1";
                            break;
                        } else
                        echo "0";
                    }
                }*/
                /*for ($i = 0; $i < strlen($pass); $i++) {
                    $char = $pass[$i];
                    if (is_numeric($char)) {
                        echo "1";
                    } else {
                        echo "0";
                    }
                }
                if(preg_match('/[\'^£$%&*()}{@!#~?><>,|=_+¬-]/', $pass))
                {
                    echo "1";
                }
                else
                    echo "0";
                /* if (strlen($pass)) 
                  {
                  for ($j = 0; $j < 9; $j++)
                  {
                  if (strpos($pass, $j) > -1)
                  {

                  echo "1";
                  }
                  else
                  echo "0";
                  }
                  }
                  else
                  echo "0"; */
            }
            ?>
            <form method = "post" action="createAccount.php">
                <input class="buttons" style="width: 200px;position: relative;top: 10px;" type="submit" value="CREATE ACCOUNT">
            </form>
        </div>
    </div>
    <div class="passid">
        
    </div>
</body>
</html>