<%-- 
    Document   : Home
    Created on : Apr 16, 2019, 9:53:16 AM
    Author     : F.I.R.E.N.Z.E
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ADMIN</title>
        <style>
            body
            {
                background-image : url('https://ak4.picdn.net/shutterstock/videos/1008360604/thumb/1.jpg');
                background-size: 1520px 730px;
                color: #66ccff;
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
                border-width: 10px;

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
                background-color: #9999ff;
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

            function logout()
            {
                location.href = "Login.jsp";
            }
            function withdrawCustomer()
            {
                location.href = "withdrawCustomer.jsp";
            }
            function customerDeposit()
            {
                location.href = "customerDeposit.jsp";
            }
            function transferTo()
            {
                location.href = "transferTo.jsp";
            }
            function searchCustomer()
            {
                location.href = "searchCustomer.jsp";
            }
            function deleteCustomer()
            {
                location.href = "deleteCustomer.jsp";
            }
            function viewCustomer()
            {
                location.href = "viewCustomer.jsp";
            }
            function statement()
            {
                location.href = "statement.jsp";
            }
            

        </script>
    </head>
    <body>
    <center>
            <h2 style="position:relative; top: 80px;">Welcome <% String name = session.getAttribute("name").toString();
                out.println(name + " (ADMIN)");%></h2>
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
