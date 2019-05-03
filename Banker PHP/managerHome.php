<?php session_start(); ?>
<html>
    <head>
        <title>Home</title>
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
    <script>
    function logout()
    {
        location.href = "Login.php";
    }
    function withdrawCustomer()
            {
                location.href = "withdrawCustomer.php";
            }
            function customerDeposit()
            {
                location.href = "depositCustomer.php";
            }
            function transferTo()
            {
                location.href = "transferTo.php";
            }
            function searchCustomer()
            {
                location.href = "searchCustomer.php";
            }
            function deleteCustomer()
            {
                location.href = "deleteCustomer.php";
            }
            function viewCustomer()
            {
                location.href = "viewAll.php";
            }
            function statement()
            {
                location.href = "statement.php";
            }
    </script>
    <body>
    <center>
        <br/><h1 >Welcome <?php echo $_SESSION['name']; ?> (MANAGER)</h1>
    </center>
        <div class="loginDiv">
            
            <button class="buttons" style="left: -200px;top: 30px;" onclick="customerDeposit()">Deposit</button><br/>
            <button class="buttons" style="left: -60px;top: -70px;" onclick="withdrawCustomer()">Withdraw</button><br/>
            <button class="buttons" style="left: 80px;top: -170px;" onclick="transferTo()">Transfer</button><br/>
            <button class="buttons" style="left: 215px;top: -270px;" onclick="searchCustomer()">Search Customer</button><br/>
            <button class="buttons" style="left: -145px;top: -200px;" onclick="deleteCustomer()">Delete Customer</button><br/>
            <button class="buttons" style="left: 0px;top: -300px;" onclick="viewCustomer()">View All Customers</button><br/>
            <button class="buttons" style="left: 180px;top: -400px;" onclick="statement()">Print Statement</button<br/>
            <button class="buttons" style="left: -50px;top: -270px;height: 40px;" onclick="logout()">LOGOUT</button>
        </div>
        
    </body>
</html>