<%-- 
    Document   : transferTo
    Created on : Apr 18, 2019, 4:38:57 PM
    Author     : F.I.R.E.N.Z.E
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ page import = "java.io.*, java.sql.*" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Transfer</title>
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
                <% out.println("Ready to transfer " + session.getAttribute("name") + "?"); %><br/><br/>
                Recipient Acc No: <input class="textBox" type="text" name="recAccno"><br/><br/>
                Enter amount to transfer : <input class="textBox" type="text" name="transferAmount"><br/><br/>
                Password : <input class="textBox" type="password" name="trPassword"><br/><br/>
                <input class="buttons" type="submit" value="TRANSFER">
                <%
                    Class.forName("com.mysql.jdbc.Driver").newInstance();
                    Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/Vault", "root", "");
                    if (!con.isClosed()) {
                        System.out.println("Connection Successfull");
                    }
                    Statement stmt = con.createStatement();
                    stmt.executeUpdate("use Vault");
                    String raccno = request.getParameter("recAccno");
                    String tamount = request.getParameter("transferAmount");
                    String password = request.getParameter("trPassword");
                    String tPass = session.getAttribute("pass").toString();

                    if (raccno != null && tamount != null && password != null) {
                        if (password.equals(tPass)) {
                            if (Integer.parseInt(tamount) <= Integer.parseInt(session.getAttribute("balance").toString())) {
                                stmt.executeUpdate("update customer set balance = (balance + " + tamount + ") where accno = " + raccno + ";");
                                stmt.executeUpdate("update customer set balance = (balance - " + tamount + ") where accno = " + session.getAttribute("accno") + ";");
                                stmt.executeUpdate("update customer set LWAMOUNT = " + tamount + " where accno = " + session.getAttribute("accno") + ";");
                                stmt.executeUpdate("update customer set LWTYPE = 'TRANSFER' where accno = " + session.getAttribute("accno") + ";");
                                stmt.executeUpdate("update customer set LWTIME = '" + (new java.util.Date()).toString() + "' where accno = " + session.getAttribute("accno") + ";");
                                out.println("Transfer Success : +$" + tamount);
                            } else {
                                out.println("Insufficient Balance!");
                            }
                        } else {
                            out.println("Invalid Password !");
                        }
                    }

                %>
            </form>
        </div>
        <%            if (session.getAttribute("type").toString().equals("customer")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:120px;\" href=\"customerHome.jsp\">HOME</a> ");
            } else if (session.getAttribute("type").toString().equals("admin")) {
                out.println("<br/><a class=\"buttons\" style=\"text-decoration: none;left: 500px;padding: 6px;top:120px;\" href=\"adminHome.jsp\">HOME</a> ");
            }
        %> 
    </body>
</html>
