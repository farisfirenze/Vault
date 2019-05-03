
<%@page import="java.sql.*"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.regex.Matcher"%>
<%@page import="java.util.regex.Pattern"%>

<html>
    <head>
        <title>Login</title>

        <style >
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
                height: 530px;
                position: relative;
                top: 80px;
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
            <form method="POST" action="creater.jsp">
                <center>
                    <table style="position: relative; top: -50px;" width="500">
                        <tbody><tr><td>Account No : </td><td><input class ="textBox" type="text" name="accno" value="<%

                            Class.forName("com.mysql.jdbc.Driver").newInstance();
                            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                            if (!con.isClosed()) {
                                System.out.println("Connection Successfull");
                            }
                            Statement stmt = con.createStatement();
                            stmt.executeUpdate("use Vault");
                            stmt.executeUpdate("create table maxacc as select accno as ACCNO from customer;");
                            ResultSet rs2 = stmt.executeQuery("select * from maxacc;");

                            if (rs2.next()) {
                                out.println(rs2.getString("ACCNO"));

                            }
                            stmt.executeUpdate("drop table maxacc");


                                                                    %>" readonly></td></tr><br/>
                        <tr><td>Password : </td><td><input class ="textBox" type="password" name="password" id="pass"><br/></td></tr><br/>
                        <tr><td></td><td><input type="checkbox" onclick="change()">Show Password</td></tr><tr><td><br/>
                        <tr><td>Confirm Password : </td><td><input class ="textBox" type="password" name="cpassword" id="cpass"></td></tr><tr><td><br/>
                        <tr><td>Account Type : </td><td><select class ="textBox" name="accType">
                                    <option value="admin">ADMIN</option>
                                    <option value="customer">CUSTOMER</option>
                                </select></td></tr><tr><td><br/>
                        <tr><td>Full Name (in CAPS): </td><td><input class ="textBox" type="text" name="fullname"></td></tr><tr><td><br/>
                        <tr><td> Address (IN CAPS): </td><td><input class ="textBox" type="text" name ="address"></td></tr><tr><td><br/>
                        <tr><td>Phone No: </td><td><input class ="textBox" type="text" name="phoneno"></td></tr><tr><td><br/>
                        <tr><td>Value of properties combined (in $) : </td><td><input class ="textBox" type="text" name="properties"></td></tr><tr><td><br/>
                        <tr><td>Deposit (in $) : </td><td><input class ="textBox" type="text" name="balance"></td></tr><tr><td><br/>
                                <p id="warn"></p>
                                <input type="submit" class="buttons" style="left: 170px;height: 50px;width: 150px;" value="CREATE ACCOUNT">
                                <a href="Login.jsp" class="buttons" style="position: relative;left: 300px;top: 10px;text-decoration: none;padding: 10px;">LOGIN</a>
                    </table>
                </center>
            </form> 
        </div>
        <script>
            function change()
            {
                var x = document.getElementById("pass");
                var y = document.getElementById("cpass");
                if (x.type == "password")
                {
                    x.type = "text";
                    y.type = "text";
                }
                else if (x.type == "text")
                {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
    </body>
</html>
