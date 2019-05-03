<%-- 
Document   : withdrawCustomer
Created on : Apr 18, 2019, 4:05:41 PM
Author     : F.I.R.E.N.Z.E
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import = "java.io.*, java.sql.*" %>
<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Withdraw</title>
    </head>
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
    <body>
<div class="loginDiv">
        <form method ="post" action="<%= request.getRequestURL()%>">
            <% out.println("<h3>Ready to withdraw " + session.getAttribute("name") + "?</h3>"); %><br/><br/><br/>
            Enter amount to withdraw : <input class="textBox" type="text" name="withdrawAmount"><br/><br/>
            Enter Password : <input class="textBox" type="password" name="withdrawPassword"><br/><br/>
            <input class="buttons" type="submit" value="WITHDRAW">
            <%
                Class.forName("com.mysql.jdbc.Driver").newInstance();
                Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                if (!con.isClosed()) {
                    System.out.println("Connection Successfull");
                }
                Statement stmt = con.createStatement();
                stmt.executeUpdate("use Vault");
                String withdrawAmount = request.getParameter("withdrawAmount");
                String withdrawPassword = request.getParameter("withdrawPassword");
                String pass = session.getAttribute("pass").toString();
                if (withdrawAmount != null && withdrawPassword != null) {
                    if (pass.equals(withdrawPassword)) {
                        if (Integer.parseInt(withdrawAmount) <= Integer.parseInt(session.getAttribute("balance").toString())) {
                            stmt.executeUpdate("update customer set balance = (balance - " + withdrawAmount + ") where accno = " + session.getAttribute("accno") + ";");
                            stmt.executeUpdate("update customer set LWAMOUNT = " + withdrawAmount + " where accno = " + session.getAttribute("accno") + ";");
                            stmt.executeUpdate("update customer set LWTYPE = 'WITHDRAW' where accno = " + session.getAttribute("accno") + ";");
                            stmt.executeUpdate("update customer set LWTIME = '" + (new java.util.Date()).toString() + "' where accno = " + session.getAttribute("accno") + ";");
                            out.println("Success: -$" + withdrawAmount);
                        } else 
                            out.println("Insufficient Balance!");
                        

                    } else {
                        out.println("Invalid Password : -$0");
                    }
                }
            %>
        </form>
</div>
        <%
            if (session.getAttribute("type").toString().equals("customer")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"customerHome.jsp\">HOME</a> ");
            } else if (session.getAttribute("type").toString().equals("admin")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:20px;\" href=\"adminHome.jsp\">HOME</a> ");
            }
        %>    
    </body>
</html>
