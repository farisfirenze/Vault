<%-- 
    Document   : customerDeposit
    Created on : Apr 17, 2019, 8:45:13 PM
    Author     : F.I.R.E.N.Z.E
--%>


<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>

<html>
    <head>
        <title>Customer Deposit</title>
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
                top: 200px;
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
    </head>
    <body>
        <div class="loginDiv">
            <form method="post" action="<%= request.getRequestURL()%>">
                <% out.println("Welcome " + session.getAttribute("name")); %><br/><br/>
                Enter amount to deposit : <input class="textBox" type="text" name="depositAmount"><br/><br/>
                Password : <input type="password" class="textBox" name="depositPassword"><br/><br/>
                <input class="buttons" type="submit" name="depositSubmit" value="DEPOSIT">
                <%
                    Class.forName("com.mysql.jdbc.Driver").newInstance();
                    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                    if (!con.isClosed()) {
                        System.out.println("Connection Successfull");
                    }
                    Statement stmt = con.createStatement();
                    stmt.executeUpdate("use Vault");

                    String depositAmount = request.getParameter("depositAmount");
                    String password = request.getParameter("depositPassword");
                    if (password != null) {
                        if (session.getAttribute("pass").toString().equals(password)) {

                            stmt.executeUpdate("update customer set balance = (balance + " + depositAmount + ") where accno = " + session.getAttribute("accno"));
                            out.println("success : +$" + depositAmount);
                        } else {
                            out.println("Invalid Password! +$0 ");
                        }
                    }

                    if (session.getAttribute("type").toString().equals("customer")) {
                        out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: -200px;padding: 6px;top:100px;\" href=\"customerHome.jsp\">HOME</a> ");
                    } else if (session.getAttribute("type").toString().equals("admin")) {
                        out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: -200px;padding: 6px;top:100px;\" href=\"adminHome.jsp\">HOME</a> ");
                    }

                %>
            </form>
        </div>

    </body>
</html>
